<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //
    public function visitor_form(){
        return view('home');
    }
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(25);
        $data = [
            'visitors' => $visitors
        ];
        return view('visitor.index', $data);
    }
    public function store(){
        request()->validate([
            'name' => 'required',
            'company' => 'required',
            'identity_number' => 'required',
            'purpose' => 'required',
            'signature' => 'required | image | max:2048'
        ]);
        $data = [
            'name' => request('name'),
            'company' => request('company'),
            'identity_number' => request('identity_number'),
            'purpose' => request('purpose'),
            'signature' => request('signature')->store('signatures')
        ];
        $visitor = Visitor::create($data);
        return back();
    }

    public function delete($id){
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();
        return back();
    }

    public function out($id){
        $visitor = Visitor::findOrFail($id);
        $visitor->out_at = date('Y-m-d H:i:s0');
        $visitor->save();
        return back();
    }
}
