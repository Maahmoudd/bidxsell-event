<?php

namespace App\Console\Commands;

use App\Jobs\EventReminderJob;
use Illuminate\Console\Command;

class EventReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send event reminder emails before 6 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        EventReminderJob::dispatch();
    }
}
