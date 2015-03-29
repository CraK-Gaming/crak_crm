<?php

class GameModel
{
	public static function getGame($game_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT game_id, name
			FROM games
			WHERE game_id = :game_id
		";
		
        $query = $database->prepare($sql);
        $query->execute(array(':game_id' => $game_id));

        return $query->fetch();
    }

    public static function getGames()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
		SELECT game_id, name 
		FROM games 
		WHERE is_deleted = 0
		ORDER BY name";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	public static function updateGame($game_id, $game_name)
    {
        if (!$game_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE games
				SET name = :game_name
				WHERE game_id = :game_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':game_id' => $game_id,
				':game_name' => $game_name
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving game');
        return false;
    }

	public static function deleteGame($game_id)
    {
        if (!$game_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE games
				SET is_deleted = 1
				WHERE game_id = :game_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':game_id' => $game_id,
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving game');
        return false;
    }
	
	public static function addGame($game_name)
    {
        if (!$game_name)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO games (name)
				VALUES(:game_name)
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':game_name' => $game_name
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving game');
        return false;
    }
}