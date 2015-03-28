<?php

class TeamModel
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

        $sql = "
			SELECT teams.team_id, teams.name as team_name, games.game_id, games.name as game_name,
					users.user_name, team_member_status.team_member_status_id, team_member_status.status as team_member_status_name
			FROM user_teams
			INNER JOIN users on users.user_id = user_teams.user_id
			INNER JOIN teams on teams.team_id = user_teams.team_id
			INNER JOIN games on games.game_id = teams.game_id
			INNER JOIN team_member_status on team_member_status.team_member_status_id = user_teams.team_member_status_id
			ORDER BY team_name, teams.team_id, users.user_name
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}