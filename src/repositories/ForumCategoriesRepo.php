<?php

namespace Repository;

use Tigress\Repository;

class ForumCategoriesRepo extends Repository
{
    public function __construct()
    {
        $this->dbName = 'default';
        $this->table = 'forum_categories';
        $this->primaryKey = ['id'];
        $this->model = 'DefaultModel';
        $this->autoload = true;
        $this->softDelete = true;
        $this->createTable = [
            'table' => "
                CREATE TABLE `{$this->table}` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `name` varchar(150) NOT NULL,
                    `description` text NULL,
                    `sort_order` int NOT NULL DEFAULT 0,
                    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `created_user_id` int NOT NULL,
                    `modified` datetime NULL DEFAULT NULL,
                    `modified_user_id` int NOT NULL,
                    `deleted` datetime NULL DEFAULT NULL,
                    `deleted_user_id` int NOT NULL,
                    `active` tinyint(1) NOT NULL DEFAULT 1,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            "
        ];
        parent::__construct();
    }
}
