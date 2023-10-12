<?php

namespace Modules\MostRentedCar\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\MostRentedCar\Models\MostRentedCar;

class MostRentedCarDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*MostRentedCar::create([
            'car_id' => "'1','2','3','4','5','6','7','8','9'"
        ]);*/
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '1',
            'most_rent_car_display_order' => '1',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '2',
            'most_rent_car_display_order' => '2',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '3',
            'most_rent_car_display_order' => '3',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '4',
            'most_rent_car_display_order' => '4',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '5',
            'most_rent_car_display_order' => '5',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '6',
            'most_rent_car_display_order' => '6',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '7',
            'most_rent_car_display_order' => '7',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '8',
            'most_rent_car_display_order' => '8',
        ]);
        MostRentedCar::create([
            'mostrentablecar_type' => 'Modules\Car\Models\Car',
            'mostrentablecar_id' => '9',
            'most_rent_car_display_order' => '9',
        ]);
    }
}
