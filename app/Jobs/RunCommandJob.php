<?php

namespace App\Jobs;

use App\Services\CronCommandLogger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RunCommandJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $command;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            \Artisan::call($this->command);
            CronCommandLogger::log($this->command, '',  '', $this->command.' Executed Succesfully', 200);
        } catch (\Exception $e) {
            CronCommandLogger::log($this->command, '',  '', json_encode($e->getMessage()), 400);
        }
    }
}
