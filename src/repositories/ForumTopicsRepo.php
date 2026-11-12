<?php

namespace Repository;

use Tigress\Repository;

class ForumTopicsRepo extends Repository
{
    public function __construct()
    {
        $this->dbName = 'default';
        $this->table = 'forum_topics';
        $this->primaryKey = ['id'];
        $this->model = 'DefaultModel';
        $this->autoload = true;
        $this->softDelete = true;
        $this->createTable = [
            'table' => "
                CREATE TABLE `{$this->table}` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `category_id` int NOT NULL,
                    `type` varchar(24) NOT NULL DEFAULT 'discussion',
                    `title` varchar(255) NOT NULL,
                    `body` mediumtext NOT NULL,
                    `pinned` tinyint(1) NOT NULL DEFAULT 0,
                    `closed` tinyint(1) NOT NULL DEFAULT 0,
                    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `created_user_id` int NOT NULL,
                    `modified` datetime NULL DEFAULT NULL,
                    `modified_user_id` int NOT NULL,
                    `deleted` datetime NULL DEFAULT NULL,
                    `deleted_user_id` int NOT NULL,
                    `active` tinyint(1) NOT NULL DEFAULT 1,
                    PRIMARY KEY (`id`),
                    KEY `forum_topics_category_listing` (`category_id`, `pinned`, `created`, `id`),
                    CONSTRAINT `forum_topics_category_fk`
                        FOREIGN KEY (`category_id`) REFERENCES `forum_categories` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            "
        ];
        parent::__construct();
    }
}
