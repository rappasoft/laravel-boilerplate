<?php

namespace Tests\Feature\Frontend;

use App\Mail\Frontend\Contact\SendContact;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class FillContactFormTest extends TestCase
{
    /** @test */
    public function the_contact_route_exists()
    {
        $this->get('/contact')->assertStatus(200);
    }

    /** @test */
    public function a_contact_mail_gets_sent()
    {
        Mail::fake();

        $response = $this->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+49 123 456 78',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.frontend.contact.sent')]);
        Mail::assertSent(SendContact::class);
    }

    /** @test */
    public function it_redirects_back_after_success()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+49 123 456 78',
            'message' => 'This is a test message',
        ]);

        $response->assertRedirect('/contact');
    }

    /** @test */
    public function phone_number_is_not_required()
    {
        Mail::fake();

        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHas('flash_success');
        Mail::assertSent(SendContact::class);
    }

    /** @test */
    public function name_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'email' => 'john@example.com',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function message_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('message');
    }
}
