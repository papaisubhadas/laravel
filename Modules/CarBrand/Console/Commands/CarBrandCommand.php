<?php

namespace Modules\CarBrand\Console\Commands;

use Illuminate\Console\Command;

class CarBrandCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarBrandCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CarBrand Command description';

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
