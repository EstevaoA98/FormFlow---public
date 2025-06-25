<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Inspecao;

class DashboardController extends Controller
{   
public function index()
{
    $inspecoes = Inspecao::where('user_id', Auth::id())->get();
    
    return view('dashboard', compact('inspecoes'));
}
}