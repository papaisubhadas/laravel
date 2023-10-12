<?php

namespace Database\Seeders\Auth;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // Create Roles
        $super_admin = Role::create(['name' => 'super admin']);
        $administrator = Role::create(['name' => 'administrator']);
        $manager = Role::create(['name' => 'manager']);
        $executive = Role::create(['name' => 'executive']);
        $user = Role::create(['name' => 'user']);
        $admin = Role::create(['name' => 'admin']);

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view_backend']);
        Permission::firstOrCreate(['name' => 'edit_settings']);
        Permission::firstOrCreate(['name' => 'view_logs']);
        Permission::firstOrCreate(['name' => 'view_notifications']);

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        Artisan::call('auth:permission', [
            'name' => 'posts',
        ]);
        echo "\n _Posts_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'categories',
        ]);
        echo "\n _Categories_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'tags',
        ]);
        echo "\n _Tags_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'comments',
        ]);
        echo "\n _Comments_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'cars',
        ]);
        echo "\n _Cars_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'cartypes',
        ]);
        echo "\n _CarTypes_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'carinquiries',
        ]);
        echo "\n _CarInquiries_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'bannerslideshows',
        ]);
        echo "\n _BannerSlideShows_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'deals',
        ]);
        echo "\n _Deals_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'carbrands',
        ]);
        echo "\n _CarBrands_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'pages',
        ]);
        echo "\n _Pages_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'mostrentedcars',
        ]);
        echo "\n _MostRentedCars_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'faqs',
        ]);
        echo "\n _FAQs_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'testimonials',
        ]);
        echo "\n _Testimonial_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'currencies',
        ]);
        echo "\n _Currency_ Permissions Created.";

        echo "\n\n";

        // Assign Permissions to Roles
        $administrator->givePermissionTo(Permission::all());
        $manager->givePermissionTo('view_backend');
        $executive->givePermissionTo('view_backend');
        $admin->givePermissionTo(
            'view_backend','view_cars','add_cars','edit_cars','delete_cars','restore_cars',
            'view_cartypes','add_cartypes','edit_cartypes','delete_cartypes','restore_cartypes',
            'view_carinquiries','add_carinquiries','edit_carinquiries','delete_carinquiries','restore_carinquiries',
            'view_bannerslideshows','add_bannerslideshows','edit_bannerslideshows','delete_bannerslideshows','restore_bannerslideshows',
            'view_deals','edit_deals',
            'view_pages','add_pages','edit_pages','delete_pages','restore_pages',
            'view_carbrands','add_carbrands','edit_carbrands','delete_carbrands','restore_carbrands',
            'view_mostrentedcars','add_mostrentedcars','delete_mostrentedcars',
            'view_posts','add_posts','edit_posts','delete_posts','restore_posts',
            'view_faqs','edit_faqs',
            'view_testimonials','add_testimonials','edit_testimonials','delete_testimonials','restore_testimonials',
            'view_currencies','add_currencies','edit_currencies','delete_currencies','restore_currencies',
            'edit_settings');

        Schema::enableForeignKeyConstraints();
    }
}
