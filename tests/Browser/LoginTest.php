<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url:'/')
                    ->assertSee(text:'Modul 3') //melihat text modul 3
                    ->clickLink(link:'Log in') //menekan tautan Log in
                    ->assertPathIs(path:'/login') //memastikan url setelah menekan tautan sebelumnya
                    ->type(field:'email', value:'test@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type(field:'password', value:'123')//mengisi input yang memiliki atribut name password.
                    ->press(button: 'LOG IN') //menekan tombol submit dari form
                    ->assertPathIs(path:'/dashboard'); //memastikan url mengarah ke dashboard
        });
    }
}
