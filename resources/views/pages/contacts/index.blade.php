<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contacts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Your Contacts</h1>
                    <a href="{{ route('contacts.create') }}" class="text-blue-500">Add New Contact</a>
                    @if($contacts->isEmpty())
                        <p>You have no contacts.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Email</th>
                                    <th class="border px-4 py-2">Phone</th>
                                    <th class="border px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                                        <td class="border px-4 py-2">{{ $contact->number }}</td>
                                        <td>
                                            <a href="{{ route('contacts.show', $contact) }}">Show</a> |
                                            <a href="{{ route('contacts.edit', $contact) }}">Edit</a> |
                                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete Contact</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
