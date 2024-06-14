<x-app-layout>
    <x-slot name="header">
        @if (Auth::user()->role === "parent")
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uploaded Homeworks
        </h2>
        @else
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Homeworks
            </h2>
            <button type="button" class="bg-gray-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('uploadModal')">
                Upload Homework
            </button>
        </div>
        @endif
    </x-slot>
    @if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('status') }}
    </div>
    @endif

    <div id="uploadModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="uploadModalLabel" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 w-full sm:max-w-md">
                <div class="mb-6">
                    <h2 id="uploadModalLabel" class="text-xl font-semibold text-gray-800">Upload Homework</h2>
                </div>
                <form action="{{ route('upload') }}" id="uploadForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <select id="subject" name="subject" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="">Select a subject</option>
                                @foreach ($subjects[0] as $subject)
                                <option value="{{ $subject }}">{{ $subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Topic Title (One line)</label>
                            <input type="text" id="description" name="description" maxlength="100" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="class_name" class="block text-sm font-medium text-gray-700">Class Name</label>
                            <select id="class" name="class" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="">Select a class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="submission_date" class="block text-sm font-medium text-gray-700">Submission Date</label>
                            <input type="date" id="submission_date" name="submission_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700">Upload File</label>
                            <input type="file" id="file" name="file" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded mr-2" onclick="resetFormAndToggleModal('uploadForm', 'uploadModal')">Cancel</button>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function resetFormAndToggleModal(formId, modalId) {
            const form = document.getElementById(formId);
            form.reset();

            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>


    @if(Auth::user()->role === 'parent')
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-2">Math Homework</h3>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestiae laborum commodi?</p>
                <p class="text-gray-500 mb-2"><strong>Date to be submitted:</strong> June 20, 2024</p>
                <p class="text-gray-500"><strong>Class:</strong> Grade 10</p>
                <div class="mt-4">
                    <a href="#" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded inline-block">Download</a>
                </div>
            </div>
        </div>

        <div class="mb-4"></div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-2">Science Homework</h3>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestiae laborum commodi?</p>
                <p class="text-gray-500 mb-2"><strong>Date to be submitted:</strong> June 25, 2024</p>
                <p class="text-gray-500"><strong>Class:</strong> Grade 8</p>
                <div class="mt-4">
                    <a href="#" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded inline-block">Download</a>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->role === 'teacher')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @forelse($homeworks as $homework)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col h-full">
                <div class="p-6 border-b border-gray-200 flex flex-col flex-grow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <img src="{{ asset('images/pdf-icon.jpg') }}" alt="PDF Logo" class="w-8 h-8 mr-2">
                            <h2 class="text-lg font-semibold text-gray-900">{{ $homework->subject }}</h2>
                        </div>
                        <div class="text-xs text-gray-400">{{ $homework->created_at->format('M d, Y') }}</div>
                    </div>
                    <p class="text-gray-600 mb-3"><strong>Topic:</strong> {{ $homework->description }}</p>
                    <div class="text-gray-500 text-sm mt-auto">
                        <p><strong>Class:</strong> {{$homework->class->name }}</p>
                        <p><strong>Date to be submitted:</strong> {{ Carbon\Carbon::parse($homework->submission_date)->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="bg-gray-200 px-6 py-4 border-t border-gray-200 flex justify-end items-center">
                    <a href="{{ asset('storage/' . $homework->file_path) }}" target="_blank" class="text-indigo-600 font-semibold">Download</a>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-lg mx-auto">No uploaded homework.</p>
            @endforelse
        </div>
    </div>
    @endif
</x-app-layout>