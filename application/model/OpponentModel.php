<?php

class OpponentModel
{
	public static function getOpponent($opponent_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT opponent_id, name
			FROM opponents
			WHERE opponent_id = :opponent_id
		";
		
        $query = $database->prepare($sql);
        $query->execute(array(':opponent_id' => $opponent_id));

        return $query->fetch();
    }
	
	public static function updateOpponent($opponent_id, $opponent_name)
    {
        if (!$opponent_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE opponents
				SET name = :opponent_name,
				WHERE opponent_id = :opponent_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':opponent_id' => $opponent_id,
				':opponent_name' => $opponent_name
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving opponent');
        return false;
    }

	public static function deleteOpponent($opponent_id)
    {
        if (!$team_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE opponent
				SET is_deleted = 1
				WHERE opponent_id = :opponent_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':opponent_id' => $opponent_id,
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving team');
        return false;
    }
	
    public static function getAllOpponents()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT opponent_id, name
			FROM opponents
			WHERE opponents.is_deleted = 0
			ORDER BY name
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}