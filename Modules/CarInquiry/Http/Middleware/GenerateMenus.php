<?php

namespace Modules\CarInquiry\Http\Middleware;

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

            // CarInquiries
            $menu->add('<i class="nav-icon fa-regular fa-file-lines"></i> '.__('Car Inquiries'), [
                'route' => 'backend.carinquiries.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/carinquiries*'],
                'permission'    => ['view_carinquiries','add_carinquiries','edit_carinquiries','delete_carinquiries','restore_carinquiries'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
