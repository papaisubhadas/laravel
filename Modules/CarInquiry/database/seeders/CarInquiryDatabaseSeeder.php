<?php

namespace Modules\CarInquiry\database\seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\CarInquiry\Models\CarInquiry;

class CarInquiryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
//        // Disable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        /*
//         * CarInquiries Seed
//         * ------------------
//         */
//
//        // DB::table('carinquiries')->truncate();
//        // echo "Truncate: carinquiries \n";
//
//        CarInquiry::factory()->count(20)->create();
//        $rows = CarInquiry::all();
//        echo " Insert: carinquiries \n\n";
//
//        // Enable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        CarInquiry::create([
            'car_type_id'          => '1',
            'car_id'               => '1',
            'customer_name'        => 'Mary Jane',
            'customer_email'       => 'maryjane@gmail.com',
            'customer_phone_no'    => '917788457845',
            'whatsapp_enable'      => 'yes',
            'start_booking_date'  => Carbon::now()->addHour(),
            'end_booking_date'     => Carbon::now()->addHour(5),
        ]);
        CarInquiry::create([
            'car_type_id'          => '2',
            'car_id'               => '2',
            'customer_name'        => 'Norman Osborn',
            'customer_email'       => 'normanosborn@gmail.com',
            'customer_phone_no'    => '918855774478',
            'whatsapp_enable'      => 'yes',
            'start_booking_date'  => Carbon::now()->addHour(2),
            'end_booking_date'     => Carbon::now()->addHour(5),
        ]);
        CarInquiry::create([
            'car_type_id'          => '3',
            'car_id'               => '3',
            'customer_name'        => 'Peter Parker',
            'customer_email'       => 'peterparker@gmail.com',
            'customer_phone_no'    => '916354784578',
            'whatsapp_enable'      => 'yes',
            'start_booking_date'  => Carbon::now()->addHour(4),
            'end_booking_date'     => Carbon::now()->addHour(5),
        ]);
    }
}
