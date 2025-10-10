<?php

declare(strict_types=1);

namespace App\Container;

class AppContainer
{
    private static ?Container $container = null;

    public static function getInstance(): Container
    {
        if (self::$container === null) {
            self::$container = new Container();
        }
        return self::$container;
    }

    public static function get(string $id): mixed
    {
        return self::getInstance()->get($id);
    }

    // Convenience methods
    public static function getTagService(): TagServiceInterface
    {
        return self::getInstance()->getTagService();
    }

    public static function getCategoryService(): CategoryServiceInterface
    {
        return self::getInstance()->getCategoryService();
    }

    public static function getArticleService(): ArticleServiceInterface
    {
        return self::getInstance()->getArticleService();
    }
}
