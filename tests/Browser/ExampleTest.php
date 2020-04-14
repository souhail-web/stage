<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use test\Mockery\Adapter\Phpunit\MockeryPHPUnitIntegrationTest;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
      /*  $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->assertUrlIs('http://localhost/login');
        });*/ //WORKS

      $this->browse(function ($browser) {
          $browser->visit($a = '/login');
          $url = $browser->driver->getCurrentURL();                     //récupère le lien ouvert par le naviguateur
          $this->assertEquals($b = 'http://localhost/login', $url);     //compare the expected link with the actual link we get
      });

        $this->browse(function ($browser) {
            $browser->visit($a = 'About');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals($b = 'http://localhost/About', $url);
        });




/*
        $user = factory(app/User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', 'admin@admin.com ')
                ->type('password', 'password')
                ->press('Login')
                ->visit("http://localhost:8000/login");
         });

*/
    }

  /*  public function testIndex()
    {
        $this->call('GET', 'App\Http\Controller\HomeController');

        $this->assertViewHas('posts');
    }*/

}

