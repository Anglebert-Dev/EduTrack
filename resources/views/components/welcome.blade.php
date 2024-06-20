<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome {{Auth::user()->name }}
    </h1>

    <p class="mt-6 text-gray-700 leading-relaxed">
        @if(Auth::user()->role === 'teacher')
        <span class="block sm:inline">As a teacher, you can use our platform to easily upload homework assignments for your students. Your students' parents can then access and review these assignments, facilitating a smoother learning experience.</span>
        <br><br>
        <strong class="text-black-700">Important:</strong> Before you proceed, please ensure that you have selected the subjects you teach in the subjects panel. This is essential for the correct assignment and tracking of homework tasks.
        @elseif(Auth::user()->role === 'parent')
        Parent! Here, you can track your child's homework assignments uploaded by their teachers. You can review these assignments and assist your child as they complete them, ensuring their academic success.
        @endif
    </p>
</div>



@if(Auth::user()->role === 'parent')
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900">Child Name</h2>
        <p class="mt-4 text-gray-500">Class: Grade 3</p>
        <p class="mt-4 text-gray-500">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="mt-4 text-gray-500">Number of homework: 3</p>
        <a href="#" class="mt-4 inline-flex items-center font-semibold text-indigo-700">Download Homework</a>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-900">Child Name</h2>
        <p class="mt-4 text-gray-500">Class: Grade 5</p>
        <p class="mt-4 text-gray-500">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="mt-4 text-gray-500">Number of homework: 2</p>
        <a href="#" class="mt-4 inline-flex items-center font-semibold text-indigo-700">Download Homework</a>
    </div>
</div>
</div>
@endif