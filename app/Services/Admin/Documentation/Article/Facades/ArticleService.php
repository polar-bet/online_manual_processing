<?php

namespace App\Services\Admin\Documentation\Article\Facades;

use Illuminate\Support\Facades\Facade;

class ArticleService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ArticleService';
    }
}
