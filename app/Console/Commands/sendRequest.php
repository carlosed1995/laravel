<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\sendParameterPost;


class sendRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:sendparameters {request=post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a simple post request';

    private $send_parameter;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(sendParameterPost $send_parameter)
    {
        parent::__construct();
        $this->send_parameter = $send_parameter;
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->send_parameter->sendData();
    }
}
