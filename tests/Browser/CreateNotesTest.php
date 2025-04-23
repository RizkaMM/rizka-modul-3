<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group createnotes
     */
    public function testCreateNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url:'/')
                    ->assertSee(text:'Modul 3') //melihat text modul 3
                    ->clickLink(link:'Log in') //menekan tautan Log in
                    ->assertPathIs(path:'/login') //memastikan url setelah menekan tautan sebelumnya
                    ->type(field:'email', value:'test@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type(field:'password', value:'123')//mengisi input yang memiliki atribut name password.
                    ->press('LOG IN') //menekan tombol submit dari form
                    ->assertPathIs(path:'/dashboard') //memastikan url mengarah ke dashboard
                    ->visit('/dashboard') //masuk ke halaman dashboard
                    ->assertSee('Dashboard')//melihat text dashboard
                    ->clickLink('Notes') //menekan tautan Notes
                    ->assertPathIs(path:'/notes') //memastikan url setelah menekan tautan sebelumnya
                    ->clickLink('Create Note') //menekan link Create Notes
                    ->assertPathIs(path:'/create-note') //memastikan url mengarah ke create-note
                    ->type(field:'title', value:'Modul 3 PPL')//mengisi input yang memiliki atribut name title.
                    ->type(field:'description', value:'hari rabu jam 10.30 kelas SI4609')//mengisi input yang memiliki atribut name DESKRIPSI
                    ->press('CREATE') //menekan tombol create untuk membuat notesnya
                    ->assertPathIs(path:'/notes'); //memastikan url setelah menekan tautan sebelumnya

        });
    }
}
