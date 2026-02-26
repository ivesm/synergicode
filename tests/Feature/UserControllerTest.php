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
            'comments' => 'Test comment',
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

     public function test_comments_can_be_null()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'additionalcomments' => null,
        ]);

        $response->assertSessionHasErrors('additionalcomments');
    }

    public function comments_must_be_string()
    {
        $response = $this->post(route('user.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'additionalcomments' => ['not', 'a', 'string'],
        ]);

        $response->assertSessionHasErrors('additionalcomments');
    }

}
