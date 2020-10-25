<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreatCompany()
    {
        $response = $this->post('/web/company-create', [
            'name'      => 'TeclaUP',
            'email'     => 'leandro@teclaup.com',
            'website'   => 'teclaup.com',
        ]);

        $response->assertCreated();

    }
}
