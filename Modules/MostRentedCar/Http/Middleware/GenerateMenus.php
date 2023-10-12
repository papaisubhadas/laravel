<?php

namespace Modules\MostRentedCar\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        \Menu::make('admin_sidebar', function ($menu) {

            // MostRentedCars
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('most_rented_car.most_rented_car'), [
                'route' => 'backend.mostrentedcars.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/mostrentedcars*'],
                'permission'    => ['view_mostrentedcars'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
