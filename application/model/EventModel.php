<?php

class EventModel
{
    public static function getUpcomingEvents()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "
			SELECT event_id, event_date, title, description
			FROM events
			WHERE event_date >= CURDATE()
			ORDER BY event_date
		";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}