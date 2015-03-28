<?php

class GameModel
{
    public static function getGames()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT game_id, name FROM games ORDER BY name";
		
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}