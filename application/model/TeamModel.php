<?php

class TeamModel
{
	public static function getTeam($team_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT team_id, teams.name as team_name, games.game_id, games.name as game_name
			FROM teams
			INNER JOIN games on games.game_id = teams.game_id
			WHERE team_id = :team_id
		";
		
        $query = $database->prepare($sql);
        $query->execute(array(':team_id' => $team_id));

        return $query->fetch();
    }
	
	public static function updateTeam($team_id, $team_name, $game_id)
    {
        if (!$team_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE teams
				SET name = :team_name,
					game_id = :game_id
				WHERE team_id = :team_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':team_id' => $team_id,
				':team_name' => $team_name,
				':game_id' => $game_id
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving team');
        return false;
    }

	public static function deleteTeam($team_id)
    {
        if (!$team_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE teams
				SET is_deleted = 1
				WHERE team_id = :team_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':team_id' => $team_id,
			)
		);

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving team');
        return false;
    }
	
    public static function getAllTeams()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT team_id, teams.name as team_name, games.game_id, games.name as game_name
			FROM teams
			INNER JOIN games on games.game_id = teams.game_id
			WHERE teams.is_deleted = 0
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
			WHERE teams.is_deleted = 0
			ORDER BY team_name, teams.team_id, users.user_name
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}