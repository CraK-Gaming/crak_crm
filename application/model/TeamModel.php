<?php

class MatchModel
{
    public static function getAllTeams()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT team_id, teams.name as team_name, games.game_id, games.name as game_name
			FROM teams
			INNER JOIN games on games.game_id = teams.game_id
			ORDER BY game_name, team_name
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	public static function getAllTeamsWithMembers()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "TODO";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}