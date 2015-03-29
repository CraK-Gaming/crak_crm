<?php

class MatchModel
{
	public static function getMatch($match_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT match_id, match_date, matches.description as match_description, matches.score,
						matches.match_status_id, match_status.status as match_status_name,
						teams.team_id, teams.name as team_name, games.game_id, games.name as game_name,
						opponents.opponent_id, opponents.name as opponent_name, tournaments.tournament_id, tournaments.name as tournament_name
				FROM matches
				INNER JOIN teams ON matches.team_id = teams.team_id
				INNER JOIN opponents ON matches.opponent_id = opponents.opponent_id
				INNER JOIN tournaments ON matches.tournament_id = tournaments.tournament_id
				INNER JOIN match_status ON matches.match_status_id = match_status.match_status_id
				INNER JOIN games ON teams.game_id = games.game_id
				WHERE matches.match_id = :match_id
		";
		
        $query = $database->prepare($sql);
        $query->execute(array(':match_id' => $match_id));

        return $query->fetch();
    }

    public static function getAllMatches()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT match_id, match_date, matches.description as match_description, matches.score,
						matches.match_status_id, match_status.status as match_status_name,
						teams.team_id, teams.name as team_name, games.game_id, games.name as game_name,
						opponents.name as opponent_name, tournaments.name as tournament_name
				FROM matches
				INNER JOIN teams ON matches.team_id = teams.team_id
				INNER JOIN opponents ON matches.opponent_id = opponents.opponent_id
				INNER JOIN tournaments ON matches.tournament_id = tournaments.tournament_id
				INNER JOIN match_status ON matches.match_status_id = match_status.match_status_id
				INNER JOIN games ON teams.game_id = games.game_id
				WHERE matches.match_status_id <> 2
					AND matches.is_deleted = 0
				ORDER BY match_date ASC
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	public static function getRecentMatches($limit)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT match_id, match_date, matches.description as match_description, matches.score,
						matches.match_status_id, match_status.status as match_status_name,
						teams.team_id, teams.name as team_name, games.game_id, games.name as game_name,
						opponents.name as opponent_name, tournaments.name as tournament_name
				FROM matches
				INNER JOIN teams ON matches.team_id = teams.team_id
				INNER JOIN opponents ON matches.opponent_id = opponents.opponent_id
				INNER JOIN tournaments ON matches.tournament_id = tournaments.tournament_id
				INNER JOIN match_status ON matches.match_status_id = match_status.match_status_id
				INNER JOIN games ON teams.game_id = games.game_id
				WHERE matches.match_status_id > 2
					AND matches.is_deleted = 0
				ORDER BY match_date DESC
				LIMIT " . $limit;
		
        $query = $database->prepare($sql);
		$query->execute();

        return $query->fetchAll();
    }
	
	public static function getUpcomingMatches()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT match_id, match_date, matches.description as match_description, matches.score,
						matches.match_status_id, match_status.status as match_status_name,
						teams.team_id, teams.name as team_name, games.game_id, games.name as game_name,
						opponents.name as opponent_name, tournaments.name as tournament_name
				FROM matches
				INNER JOIN teams ON matches.team_id = teams.team_id
				INNER JOIN opponents ON matches.opponent_id = opponents.opponent_id
				INNER JOIN tournaments ON matches.tournament_id = tournaments.tournament_id
				INNER JOIN match_status ON matches.match_status_id = match_status.match_status_id
				INNER JOIN games ON teams.game_id = games.game_id
				WHERE matches.match_status_id = 1
					AND matches.is_deleted = 0
				ORDER BY match_date ASC
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	public static function updateMatch($match_id, $team_id, $opponent_id, $date, $tournament_id, $score, $match_status_id, $description)
    {
        if (!$team_id)
            return false;

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE matches
				SET team_id = :team_id,
					opponent_id = :opponent_id,
					match_date = :date,
					tournament_id = :tournament_id,
					score = :score,
					match_status_id = :match_status_id,
					description = :description
				WHERE match_id = :match_id
			";
        $query = $database->prepare($sql);
        $query->execute(
			array(
				':match_id' => $match_id,
				':team_id' => $team_id,
				':opponent_id' => $opponent_id,
				':date' => $date,
				':tournament_id' => $tournament_id,
				':score' => $score,
				':match_status_id' => $match_status_id,
				':description' => $description
			)
		);
		
		// match_date = :date,
		// ':date' => $date,

        if ($query->rowCount() == 1)
            return true;

        Session::add('feedback_negative', 'Error saving team');
        return false;
    }
}