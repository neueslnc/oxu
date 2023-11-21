<?php

namespace App\Jobs;

use App\Imports\StudentsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ProccessUserImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    private $file_xlxs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file_xlxs = $file;
    }

    /**
     * Execute the job.
     *
     * @return \Maatwebsite\Excel\Excel
     */
    public function handle()
    {

        return Excel::import(new StudentsImport, $this->file_xlxs);
    }
}
