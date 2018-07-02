<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;

class HomeController extends Controller
{
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.dashboard', $data);
    }
}
