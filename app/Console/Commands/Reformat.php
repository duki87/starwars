<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Reformat extends Command
{
    protected $signature = 'command:reformat';

    protected $description = 'Reformat given string - removes vowels, lowercase except the first letter.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $str = '';
        while(empty($str)) {
            $str = $this->ask('Please enter string to reformat.');
        }
        $str = $this->reformat($str);
        $this->info('Reformatted string:');
        $this->info($str);
    }

    private function reformat($str) {
        return preg_replace('#[aeiou]+#i', '', ucfirst(strtolower($str)));
    }
}
