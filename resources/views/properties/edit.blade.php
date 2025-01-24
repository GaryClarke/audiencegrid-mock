<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Properties for Profile: ') }} {{ $profile->email }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('profiles.update', $profile->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            @foreach($properties as $property)
                                <div>
                                    <label for="property-{{ $property->id }}" class="block text-sm font-medium text-gray-700">
                                        {{ $property->key }}
                                    </label>
                                    <input
                                        type="text"
                                        name="properties[{{ $property->id }}]"
                                        id="property-{{ $property->id }}"
                                        value="{{ $property->value }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    >
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
{{--                            <button type="submit">Update</button>--}}
                            <button
                                type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-300"
                            >
                                {{ __('Update Properties') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
