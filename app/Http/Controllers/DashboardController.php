<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $visitor = Visitor::all();
        $company = Company::all();

        return view('dashboard.index',[
            'title' => 'Dashboard',
            'visitor' => $visitor,
            'company' => $company,
        ]);
    }
}
