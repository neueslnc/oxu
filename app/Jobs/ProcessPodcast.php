<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $file_xlxs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        //

        $this->file_xlxs = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Excel::import(new UsersImport, $this->file_xlxs);
    }
}
