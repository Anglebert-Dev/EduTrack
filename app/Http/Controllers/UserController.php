<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Homework;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $homeworks = Homework::where('teacher_id', auth()->user()->id)->get();

        $classes = Classes::all();
        $subjects = User::where('id', auth()->user()->id)
            ->pluck('subjects')
            ->map(function ($item) {
                return json_decode($item);
            })->toArray();

        $selectedClassNames = User::where('id', auth()->user()->id)
            ->pluck('class_name')
            ->map(function ($item) {
                return json_decode($item);
            })
            ->flatten() // Flatten the array if it's nested
            ->toArray();

        $classIds = Classes::whereIn('name', $selectedClassNames)->pluck('id');

        $parents_homeworks =  Homework::whereIn('class_id', $classIds)->get();

        $classes = Classes::all();
        // dd($subjects);
        return view('homework.homework', compact('homeworks', 'classes', 'subjects', 'parents_homeworks'));
    }

    public function show_subjects()
    {
        $subjects = Subject::all();
        return view('homework.subjects', compact('subjects'));
    }

    public function show_class()
    {

        $classes = Classes::all();


        $selectedClassesJson = User::where('id', auth()->user()->id)
            ->pluck('class_name')
            ->first();

        $selectedClasses = json_decode($selectedClassesJson, true) ?? [];

        // Debug to verify the selected classes
        // dd($selectedClasses);

        return view('parents.classes', compact('classes', 'selectedClasses'));
    }



    public function store_class(Request $request)
    {
        $request->validate([
            'classes' => 'required|array',
            'classes.*' => 'exists:classes,name', // Validate against your classes table
        ]);

        $user = Auth::user();
        $user->class_name = json_encode($request->classes);
        $user->save();
        return redirect()->route('classes.show')->with('status', 'Classes updated successfully!');
    }

    public function subjects(Request $request)
    {
        $request->validate([
            'subjects' => 'required|array|min:1',
        ]);

        $user = Auth::user();
        $user->subjects = json_encode($request->subjects);
        $user->save();

        return redirect()->route('subjects')->with('status', 'Subjects successfully updated!');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:100',
            'class' => 'required|integer',
            'submission_date' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
        ]);
        $filePath = $request->file('file')->store('uploads', 'public');

        Homework::create([
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'class_id' => $request->input('class'),
            'teacher_id' => Auth::user()->id,
            'submission_date' => $request->input('submission_date'),
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('status', 'Homework uploaded successfully!');
    }

    // classes
}
