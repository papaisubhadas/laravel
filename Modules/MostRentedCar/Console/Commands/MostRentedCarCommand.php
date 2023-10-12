<?php

namespace Modules\MostRentedCar\Console\Commands;

use Illuminate\Console\Command;

class MostRentedCarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MostRentedCarCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'MostRentedCar Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
