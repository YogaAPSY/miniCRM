<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function it_stores_data()
    {


        //Membuat objek user yang otomatis menambahkannya ke database.
        $user = factory(Employee::class)->create();

        //Membuat objek category yang otomatis menambahkannya ke database.
        $category = factory(Company::class)->create();

        //Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($user)
            //Hit post ke method store, fungsinya ya akan lari ke fungsi store.
            ->post(route('employee.store'), [
                //isi parameter sesuai kebutuhan request
                'first_name' => $this->faker->words(3, true),
                'last_name' => $this->faker->words(3, true),
                'company_id' => $category->id,
                'email' => $this->faker->words(3, true),
                'phone' => $this->faker->randomNumber(6),
            ]);

        //Tuntutan status 302, yang berarti redirect status code.
        $response->assertStatus(302);

        //Tuntutan bahwa abis melakukan POST URL akan dialihkan ke URL product atau routenya adalah product.index
        $response->assertRedirect(route('employee.index'));

        $response->assertStatus(200);
    }
}
