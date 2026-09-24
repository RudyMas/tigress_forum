<?php

namespace Controller\forum;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class ForumController (PHP 8.5+)
 *
 * @author Rudy Mas <rudy.mas@rudymas.be>
 * @copyright 2026 Rudy Mas (https://www.rudymas.be)
 * @license Apache License 2.0 (https://www.apache.org/licenses/LICENSE-2.0)
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

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function index(): void
    {
        TWIG->render('forum/index.twig');
    }
}