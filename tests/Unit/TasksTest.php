<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TasksTest extends TestCase
{
    public function testRepeatArray()
    {
        \Artisan::call('command:array_repeat [1,2,3]');
        $result = \Artisan::output();
        $this->assertTrue(json_decode($result) === [1,2,3,1,2,3,1,2,3]);
    }

    // public function testReformatString()
    // {
    //     \Artisan::call('command:reformat'); //'TyPEqaSt DeveLoper TeST'
    //     $result = \Artisan::output();
    //     $this->assertTrue($result === 'Typqst dvlpr tst');
    // }

    public function testNextBinary()
    {
        \Artisan::call('command:next_binary_number [1,0,0,0,0,0,0,0,0,1]');
        $result = \Artisan::output();
        $this->assertTrue(json_decode($result) == "1000000010");
    }
}
