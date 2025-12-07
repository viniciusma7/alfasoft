<?php
namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function all()
    {
        return Contact::all();
    }

    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data)
    {
        return $contact->update($data);
    }

    public function delete(Contact $contact)
    {
        return $contact->delete();
    }
}
