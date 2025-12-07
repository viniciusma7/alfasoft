<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_cannot_create_contact_with_invalid_data()
    {
        $response = $this->actingAs($this->user)->post(route('contacts.store'), [
            'name' => '',
            'number' => '123',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['name', 'number', 'email']);
    }

    public function test_cannot_update_contact_with_invalid_data()
    {
        $contact = Contact::factory()->create();

        $response = $this->actingAs($this->user)->put(route('contacts.update', $contact), [
            'name' => '',
            'number' => 'short',
            'email' => 'invalid',
        ]);

        $response->assertSessionHasErrors(['name', 'number', 'email']);
    }

    public function test_cannot_create_contact_with_duplicate_email_or_number()
    {
        $existing = Contact::factory()->create([
            'email' => 'test@example.com',
            'number' => '123456789',
        ]);

        $response = $this->actingAs($this->user)->post(route('contacts.store'), [
            'name' => 'Another Name',
            'number' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors(['number', 'email']);
    }

    public function test_cannot_update_contact_with_duplicate_email_or_number()
    {
        $contact1 = Contact::factory()->create([
            'email' => 'first@example.com',
            'number' => '111111111',
        ]);
        $contact2 = Contact::factory()->create([
            'email' => 'second@example.com',
            'number' => '222222222',
        ]);

        $response = $this->actingAs($this->user)->put(route('contacts.update', $contact2), [
            'name' => 'Updated Name',
            'number' => '111111111',
            'email' => 'first@example.com',
        ]);

        $response->assertSessionHasErrors(['number', 'email']);
    }
}
