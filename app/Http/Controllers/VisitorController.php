<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    public function visitor_index(){
        $visitor = Visitor::filter(['search' => request('search')])
        ->whereRaw('date(created_at) = DATE(NOW())')
        ->orderBy('created_at', 'desc')
        ->paginate(6)->withQueryString();
        $data = [
            'visitors' => $visitor,
            'title' => 'Buku Tamu',
            // 'from' => ,
        ];
        // return response()->json($visitor,200);
        return view('dashboard.visitors',$data);
    }
    public function visitor_form(){
        $company = Company::all();
        $data =[
            'companies' => $company,
        ];
        return view('home',$data);
    }
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(25);
        $data = [
            'visitors' => $visitors
        ];
        return view('visitor.index', $data);
    }
    public function store(Request $request){
        // dd($request->all());
        try {
            request()->validate([
                'name' => 'required',
                'company' => 'required',
                'identity_number' => 'required',
                'purpose' => 'required',
                'signature' => 'required'
            ]);
            $data = [
                'name' => request('name'),
                'company' => request('company'),
                'identity_number' => request('identity_number'),
                'purpose' => request('purpose'),
                'signature' => request('signature')->store('signatures')
            ];
            // dd($data);
            $visitor = Visitor::create($data);
            if($visitor){
                return redirect('/')->with('success', 'Anda berhasil tercatat');
                    }else{
                        return redirect('/')->with('error', 'Anda gagal tercatat .');
                    }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }


    public function delete($id){
        $visitor = Visitor::findOrFail($id);
        $response = $visitor->delete();
        if($response){
            return redirect('/buku-tamu')->with('success', 'Berhasil Menghapus');
                }else{
                    return redirect('/buku-tamu')->with('error', 'Gagal Menghapus');
                }
    }

    public function out($id){
        $visitor = Visitor::findOrFail($id);
        $visitor->out_at = date('Y-m-d H:i:s P');
        $visitor->save();
        return back();
    }
}
