<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\Contracts\CartRepositoryContract;
use App\Repositories\Contracts\ProductRepositoryContract;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class BindingsServiceProvider extends ServiceProvider
{
    private const REPOSITORIES = [
        CartRepositoryContract::class => [
            CartRepository::class,
        ],
        ProductRepositoryContract::class => [
            ProductRepository::class
        ],
    ];


    public function register(): void
    {
        foreach (self::REPOSITORIES as $contract => $implementation) {
            $this->app->bind($contract, $implementation[0]);
        }
    }

}
