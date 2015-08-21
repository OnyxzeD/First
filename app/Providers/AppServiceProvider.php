<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    var $crud = 'App\Domain\Contracts\Crudable';

    /**
     * @var string
     */
    var $paginate = 'App\Domain\Contracts\Paginable';

    /**
     * @var string
     */
    var $search = 'App\Domain\Contracts\Searchable';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $guestController = 'App\Http\Controllers\Guest\GuestController';
        $guestRepo = 'App\Domain\Repositories\GuestRepository';
        $this->app->when($guestController)
            ->needs($this->search)
            ->give($guestRepo);
        $this->app->when($guestController)
            ->needs($this->crud)
            ->give($guestRepo);
        $this->app->when($guestController)
            ->needs($this->paginate)
            ->give($guestRepo);

        $this->regUser();

    }

    /**
     *
     */
    function regUser()
    {
        $userController = 'App\Http\Controllers\User\UserController';
        $userRepo = 'App\Domain\Repositories\UserRepository';

        $this->app->when($userController)
            ->needs($this->search)
            ->give($userRepo);
        $this->app->when($userController)
            ->needs($this->crud)
            ->give($userRepo);
        $this->app->when($userController)
            ->needs($this->paginate)
            ->give($userRepo);
    }
}
