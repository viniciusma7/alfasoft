<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function all($requestTrashed = false)
    {
        if ($requestTrashed) {
            return Contact::onlyTrashed()->get();
        }

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

    public function restore(int $contact): void
    {
        Contact::onlyTrashed()->where('id', $contact)->restore();
    }

    public function forceDelete(int $id): void
    {
        Contact::onlyTrashed()->where('id', $id)->forceDelete();
    }
}
