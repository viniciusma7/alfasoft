<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function all()
    {
        return Contact::all();
    }

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data): Contact
    {
        $contact->update($data);

        return $contact;
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }
}
