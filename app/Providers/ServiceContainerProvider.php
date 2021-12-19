<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Discount\DiscountRepository;
use App\Repositories\Discount\DiscountRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Customer\CustomerService;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\Discount\DiscountService;
use App\Services\Discount\DiscountServiceInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceContainerProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->repositoryBindings();

        $this->serviceBindings();

        $this->resolverBindings();
    }

    /**
     * Repository bindings
     */
    protected function repositoryBindings(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(DiscountRepositoryInterface::class, DiscountRepository::class);
    }

    /**
     * Service bindings
     */
    protected function serviceBindings(): void
    {
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(DiscountServiceInterface::class, DiscountService::class);
    }

    /**
     * Service bindings
     */
    protected function resolverBindings(): void
    {
        //$this->app->bind(PerPageResolverInterface::class, PerPageResolver::class);
    }

    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            //Repositories
            OrderRepositoryInterface::class,
            OrderRepository::class,
            ProductRepositoryInterface::class,
            ProductRepository::class,
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
            CustomerRepositoryInterface::class,
            CustomerRepository::class,
            DiscountRepositoryInterface::class,
            DiscountRepository::class,

            //Services...
            OrderServiceInterface::class,
            OrderService::class,
            ProductServiceInterface::class,
            ProductService::class,
            CategoryServiceInterface::class,
            CategoryService::class,
            CustomerServiceInterface::class,
            CustomerService::class,

            // Resolvers...

        ];
    }
}
