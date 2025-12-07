<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(
        protected ContactService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = $this->service->all($request->has('trashed'));

        return view('pages.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $contact = $this->service->create($request->validated());

            return redirect()
                ->route('contacts.edit', $contact)
                ->with('success', 'Contact created successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unable to create contact now, please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('pages.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('pages.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        try {
            $this->service->update($contact, $request->validated());

            return redirect()
                ->route('contacts.edit', $contact)
                ->with('success', 'Contact updated successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unable to update contact now, please try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $this->service->delete($contact);

            return redirect()
                ->route('contacts.index')
                ->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Unable to delete contact now, please try again later.');
        }
    }

    public function restore(int $idContact)
    {
        try {
            $this->service->restore($idContact);

            return redirect()
                ->route('contacts.index')
                ->with('success', 'Contact restored successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Unable to restore contact now, please try again later.');
        }
    }

    public function forceDelete(int $idContact)
    {
        try {
            $this->service->forceDelete($idContact);

            return redirect()
                ->route('contacts.index', ['trashed' => true])
                ->with('success', 'Contact permanently deleted successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Unable to permanently delete contact now, please try again later.');
        }
    }
}
