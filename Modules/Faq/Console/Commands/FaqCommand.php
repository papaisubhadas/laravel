<?php

namespace Modules\Faq\Console\Commands;

use Illuminate\Console\Command;

class FaqCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:FaqCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Faq Command description';

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
