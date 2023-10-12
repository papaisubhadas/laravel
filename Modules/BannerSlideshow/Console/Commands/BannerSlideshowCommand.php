<?php

namespace Modules\BannerSlideshow\Console\Commands;

use Illuminate\Console\Command;

class BannerSlideshowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:BannerSlideshowCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BannerSlideshow Command description';

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
