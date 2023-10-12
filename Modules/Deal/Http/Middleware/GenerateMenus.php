<?php

namespace Modules\Deal\Http\Middleware;

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

            // Deals __('deal.deals_title');
            $menu->add('<i class="nav-icon fa-regular fa-handshake"></i> '.__('deal.deals_title'), [
                'route' => 'backend.deals.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/deals*'],
                'permission'    => ['view_deals','add_deals','edit_deals','delete_deals','restore_deals'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
