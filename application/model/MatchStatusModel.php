<?php

class MatchStatusModel
{
    public static function getAllMatchStatuses()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT match_status_id, status
			FROM match_status
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}