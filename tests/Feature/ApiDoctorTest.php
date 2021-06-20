<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiDoctorTest extends TestCase
{

    public function testStatusCode()
    {
        $response = $this->get('/api/doctors');
        $response->assertStatus(200);
    }

    public function testDataExists()
    {
        $response = $this->get('/api/doctors');
        if ($response->getData()) {
            $response->assertOk(true);
        }
    }

}
