<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact {{ $contact->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Contact {{ $contact->name }}</h1>
                    <div class="mb-4">
                        <p><strong>Name:</strong> {{ $contact->name }}</p>
                        <p><strong>Email:</strong> {{ $contact->email }}</p>
                        <p><strong>Phone:</strong> {{ $contact->number }}</p>
                    </div>

                    <div>
                        <a href="{{ route('contacts.index') }}" class="text-blue-500">Back to Contacts</a>
                        <a href="{{ route('contacts.edit', $contact) }}">Edit Contact</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
