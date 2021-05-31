<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NextBinaryNumber extends Command
{
    protected $signature = 'command:next_binary_number {arr}';

    protected $description = 'Return the next binary number in a string.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $arr = json_decode($this->argument('arr'));
        $this->info(json_encode($this->next_binary_number($arr)));
    }

    private function next_binary_number($arr) {
        $break = false;
        $output = '';
        for($i=count($arr)-1; $i>=0; $i--) {
            if(!$break) {
                if ($arr[$i] === 0) {
                    $output = 1 . $output;
                    $break = true;
                } else {
                    $output = 0 . $output;
                }
            } else {
                $output = $arr[$i] . $output;
            }
        }
        if (!$break) {
            $output = 1 . $output;
        } 
        return $output;
    }        
}
