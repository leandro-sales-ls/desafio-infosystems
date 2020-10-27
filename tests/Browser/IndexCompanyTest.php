<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class IndexCompanyTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = factory(User::class)->create([
            'email' => 'admin'.rand(1,1000).'@material.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('letsgo')
                    ->visit('/company-edit/1')
                    ->assertPathIs('/company-edit/1');
        });
    }
}
