<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ParentController extends Controller
{
    public function redirect()
    {
        $userRole = Auth::user()->role;
        if ($userRole === 'parent') {
            return view('parents.home');
        } else {
            return view('dashboard');
        }
    }
}
