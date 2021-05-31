<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RepeatArray extends Command
{
    protected $signature = 'command:array_repeat {arr}';

    protected $description = 'Repeat 3 times the contents of an array.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $arr = json_decode($this->argument('arr'));
        $this->info(json_encode($this->repeat($arr)));
    }

    private function repeat($arr) {
        $repeat = array();
        for($i=0;$i<3;$i++) {
            $repeat = array_merge($arr, $repeat);
        }
        return $repeat;
    }
}
