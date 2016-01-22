<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testStringsAreReversed()
    {
        $this->post('/strings/api/v1/reverse', ['input' => '123']);
        $this->receiveJson(['input' => '123', 'output' => '321']);
    }
}
