<?php

namespace Controller\forum;

use Twig\Error\LoaderError;

/**
 * Class ForumController (PHP 8.5+)
 *
 * @author Rudy Mas <rudy.mas@go-next.be>
 * @copyright 2026 GO! Next (https://www.go-next.be)
 * @license Proprietary
 * @version 2026.01.29.0
 * @package Controller
 */
class ForumController
{
    /**
     * @throws LoaderError
     */
    public function __construct()
    {
        TWIG->addPath('vendor/tigress/forum/src/views');
    }

    public function index(): void
    {
        TWIG->render('forum/index.twig');
    }
}