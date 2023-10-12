<?php

namespace Modules\CarType\Console\Commands;

use Illuminate\Console\Command;

class CarTypeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarTypeCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CarType Command description';

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
