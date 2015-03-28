<?php

class BlogModel
{
    public static function getLatestNews()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT blog_post_id, created_on, title, description, author_id, user_name
			FROM blog_posts 
			INNER JOIN users ON blog_posts.author_id = users.user_id
			WHERE is_deleted = 0 
			ORDER BY created_on DESC
		";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}