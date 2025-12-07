<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->service->all();

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
        $contact = $this->service->create($request->all());

        return redirect()->route('contacts.edit', $contact);
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
        $this->service->update($contact, $request->all());

        return redirect()->route('contacts.edit', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->service->delete($contact);

        return redirect()->route('contacts.index');
    }
}
