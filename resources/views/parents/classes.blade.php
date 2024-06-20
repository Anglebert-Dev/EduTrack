<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Select Classes for Your Student
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Class Selection Form -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('status') }}
                    <button type="button" class="absolute top-0 right-0 mt-1 mr-2 text-gray-700 hover:text-gray-900" onclick="this.parentElement.style.display='none'">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.293 5.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414L10 8.586l4.293-4.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                @endif
                <form method="POST" action="{{ route('classes.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="classes" value="{{ __('Classes') }}" />
                        <div class="mt-2 space-y-2">
                            @foreach ($classes as $class)
                            <div class="flex items-center">
                                <input id="class-{{ $class->id }}" name="classes[]" value="{{ $class->name }}" type="checkbox" class="h-4 w-4 text-indigo-700 border-gray-300 rounded focus:ring-indigo-500" @if(in_array($class->name, $selectedClasses)) checked @endif>
                                <label for="class-{{ $class->id }}" class="ml-2 block text-sm text-gray-900">{{ $class->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('classes')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Save Classes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>