<?php

namespace Modules\CarInquiry\Console\Commands;

use Illuminate\Console\Command;

class CarInquiryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarInquiryCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CarInquiry Command description';

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
