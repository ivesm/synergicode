<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function workingUserInformation()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'additionalcomment' => 'Test comment',
        ]);

        $response->assertRedirect(route('confirmation.page'));

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }


     public function name_is_required()
    {
        $response = $this->post(route('user.store'), [
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function email_is_required()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function email_must_be_valid_format()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

     public function comments_cannot_be_null()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            
        ]);

        $response->assertSessionHasErrors('additionalcomment');
    }

    public function comments_must_be_string()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'additionalcomment' => ['not', 'a', 'string'],
        ]);

        $response->assertSessionHasErrors('additionalcomment');
    }


    public function user_can_submit_form()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John',
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);
    }


}
