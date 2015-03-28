<?php

class MatchModel
{
    public static function getLatestMatches()
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
				ORDER BY matches.match_status_id <> 1, match_date ASC
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}