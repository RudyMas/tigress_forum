<?php

namespace Repository;

use Tigress\Repository;

class ForumPostsRepo extends Repository
{
    public function __construct()
    {
        $this->dbName = 'default';
        $this->table = 'forum_posts';
        $this->primaryKey = ['id'];
        $this->model = 'DefaultModel';
        $this->autoload = true;
        $this->softDelete = true;
        $this->createTable = [
            'table' => "
                CREATE TABLE `{$this->table}` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `topic_id` int NOT NULL,
                    `body` mediumtext NOT NULL,
                    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `created_user_id` int NOT NULL,
                    `modified` datetime NULL DEFAULT NULL,
                    `modified_user_id` int NOT NULL,
                    `deleted` datetime NULL DEFAULT NULL,
                    `deleted_user_id` int NOT NULL,
                    `active` tinyint(1) NOT NULL DEFAULT 1,
                    PRIMARY KEY (`id`),
                    KEY `forum_posts_topic_listing` (`topic_id`, `created`, `id`),
                    CONSTRAINT `forum_posts_topic_fk`
                        FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            "
        ];
        parent::__construct();
    }
}
