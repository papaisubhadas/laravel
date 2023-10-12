<?php

namespace Modules\BannerSlideshow\Http\Middleware;

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

            // BannerSlideshows
            $menu->add('<i class="nav-icon fa-solid fa-film"></i> '.__('banner.banner_menu'), [
                'route' => 'backend.bannerslideshows.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/bannerslideshows*'],
                'permission'    => ['view_bannerslideshows','add_bannerslideshows','edit_bannerslideshows','delete_bannerslideshows','restore_bannerslideshows'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
