<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <x-message-session/>

                    <h1 class="text-3xl font-bold mb-6 text-indigo-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        {{ $contact->name }}
                    </h1>
                    <div class="mb-8 grid grid-cols-1 gap-4">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-gray-700">E-mail:</span>
                            <span class="text-gray-900">{{ $contact->email }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-gray-700">Phone Number:</span>
                            <span class="text-gray-900">{{ $contact->number }}</span>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Back</a>
                        <a href="{{ route('contacts.edit', $contact) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
