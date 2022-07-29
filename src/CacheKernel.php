<?php


namespace App;


use JetBrains\PhpStorm\ArrayShape;
use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

class CacheKernel extends HttpCache
{
    #[ArrayShape(['default_ttl' => "int"])]
    protected function getOptions(): array
    {
        return [
            'default_ttl'=>0
        ];
    }
}