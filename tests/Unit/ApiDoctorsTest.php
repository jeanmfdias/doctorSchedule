<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiDoctorsTest extends TestCase
{
   
    public function testStatusCode()
    {
        $response = $this->get('/api/doctors');
        $response->assertStatus(200);
    }

    public function testDataExists()
    {
        $response = $this->get('/api/doctors');
        // dd($response);
        if ($response->getData()) {
            $response->assertOk(true);
        }
    }

}
