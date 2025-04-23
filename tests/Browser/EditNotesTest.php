<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editNotes
     */
    public function testEditNotes(): void
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
                    ->clickLink('Notes') //menekan tautan Notes
                    ->assertPathIs(path:'/notes') //memastikan url setelah menekan tautan masuk ke halaman notes
                    ->click('@edit-1') //menekan link edit untuk mengubah notes
                    ->assertPathIs(path:'/edit-note-page/1') //memastikan url mengarah ke edit note
                    ->type(field:'title', value:'Modul 3 PPL')//mengisi input yang memiliki atribut name title.
                    ->type(field:'description', value:'hari rabu jam 10.30 kelas SI4609 di tult r3 ')//mengisi input yang memiliki atribut name DESKRIPSI
                    ->press('UPDATE') //menekan tombol update untuk mengubah isi notes
                    ->assertPathIs(path:'/notes'); //memastikan url mengarahkan halaman note
        });
    }
}
