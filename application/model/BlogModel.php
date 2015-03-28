<?php

class BlogModel
{
    public static function getLatestNews()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT blog_post_id, created_on, title, description FROM blog_posts WHERE is_deleted = 0 ORDER BY created_on DESC";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}