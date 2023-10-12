<?php

namespace Modules\Currency\Http\Middleware;

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

            // Currencies
            $menu->add('<i class="nav-icon fa-solid fa-money-bill"></i> '.__('Currencies'), [
                'route' => 'backend.currencies.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/currencies*'],
                'permission'    => ['view_currencies','add_currencies','edit_currencies','delete_currencies','restore_currencies'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
