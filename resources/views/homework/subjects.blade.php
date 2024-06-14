<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Select Subjects You Teach
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Subject Selection Form -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-4"></h3>

                @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('subjects') }}">
                    @csrf

                    <div class="mb-4">
                        <x-label for="subjects" value="{{ __('Subjects') }}" />
                        <div class="mt-2 space-y-2">

                            @foreach ($subjects as $subject )
                            <div class="flex items-center">
                                <input id="subject-math" name="subjects[]" value="{{$subject->name}}" type="checkbox" class="h-4 w-4 text-indigo-700 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="subject-math" class="ml-2 block text-sm text-gray-900">{{$subject->name}}</label>
                            </div>
                            @endforeach

                        </div>
                        @error('subjects')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Save Subjects</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>