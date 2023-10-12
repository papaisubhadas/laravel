<?php

namespace Modules\CarType\Http\Middleware;

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

            // CarTypes
            $menu->add('<i class="nav-icon fa-solid fa-car-on"></i> '.__('cartype.cartypes.index.cartype_title'), [
                'route' => 'backend.cartypes.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/cartypes*'],
                'permission'    => ['view_cartypes','add_cartypes','edit_cartypes','delete_cartypes','restore_cartypes'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
