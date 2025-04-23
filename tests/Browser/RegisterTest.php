<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser):void {
            $browser->visit(url:'/')
                    ->assertSee(text:'Modul 3') //melihat text modul 3
                    ->clickLink(link:'Register') //menekan tautan Register
                    ->assertPathIs(path:'/register') //memastikan url setelah menekan tautan sebelumnya
                    ->type(field:'name', value:'user') //mengisi input yang memiliki atribut name.
                    ->type(field:'email', value:'test@gmail.com')//mengisi input yang memiliki atribut name email.
                    ->type(field:'password', value:'123')//mengisi input yang memiliki atribut name password
                    ->type(field:'password_confirmation', value:'123')//mengisi input yang memiliki atribut name password confimation.
                    ->press(button: 'REGISTER')//menekan tombol submit dari form
                    ->assertPathIs(path:'/dashboard');//memastikan url mengarah ke dashboard


        });
    }
}
