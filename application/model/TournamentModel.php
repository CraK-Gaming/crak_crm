<?php

class TournamentModel
{
	public static function getTournament($tournament_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT tournament_id, name
			FROM tournaments
			WHERE tournament_id = :tournament_id
		";
		
        $query = $database->prepare($sql);
        $query->execute(array(':tournament_id' => $tournament_id));

        return $query->fetch();
    }
	
	public static function updateTournament($tournament_id, $tournament_name)
    {
        if (!$tournament_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE tournaments
				SET name = :tournament_name,
				WHERE tournament_id = :tournament_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':tournament_id' => $tournament_id,
				':tournament_name' => $tournament_name
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving tournament');
        return false;
    }

	public static function deleteOpponent($tournament_id)
    {
        if (!$tournament_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE tournaments
				SET is_deleted = 1
				WHERE tournament_id = :tournament_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':tournament_id' => $tournament_id,
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving tournament');
        return false;
    }
	
    public static function getAllTournaments()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT tournament_id, name
			FROM tournaments
			WHERE tournaments.is_deleted = 0
			ORDER BY name
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}