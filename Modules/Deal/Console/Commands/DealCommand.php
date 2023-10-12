<?php

namespace Modules\Deal\Console\Commands;

use Illuminate\Console\Command;

class DealCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DealCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deal Command description';

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
