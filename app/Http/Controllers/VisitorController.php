<?php

namespace App\Http\Controllers;

use App\Exports\VisitorsExport;
use App\Models\Company;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VisitorController extends Controller
{
    public function export()
    {
        return Excel::download(new VisitorsExport, 'visitor.xlsx');
    }
    public function visitor_index()
    {
        $visitor = Visitor::filter(request(['search', 'from_date', 'to_date']))
            ->orderBy('created_at', 'desc')
            ->paginate(6)->withQueryString();

        $data = [
            'visitors' => $visitor,
            'title' => 'Buku Tamu',
            'search' => request('search') ?? null,
            'from_date' => request('from_date') ?? null,
            'to_date' => request('to_date') ?? null,
        ];
        // return response()->json($visitor,200);
        return view('dashboard.visitors', $data);
    }
    public function visitor_form()
    {
        $company = Company::all();
        $data = [
            'companies' => $company,
        ];
        return view('form-tamu', $data);
    }
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(25);
        $data = [
            'visitors' => $visitors
        ];
        return view('visitor.index', $data);
    }
    public function store(Request $request)
    {
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
            if ($visitor) {
                return redirect('/')->with('success', 'Anda berhasil tercatat');
            } else {
                return redirect('/')->with('error', 'Anda gagal tercatat .');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function VisitorHome()
    {
        return view('home');
    }
    public function delete($id)
    {
        $visitor = Visitor::findOrFail($id);
        $response = $visitor->delete();
        if ($response) {
            return back()->with('success', 'Berhasil Menghapus');
        } else {
            return back()->with('error', 'Gagal Menghapus');
        }
    }
    public function approve($id)
    {
        // dd(request()->all());
        $visitor = Visitor::findOrFail($id);
        $visitor->status = 'accepted';
        $visitor->approved_by = auth()->user()->name;
        $visitor->is_given_card = request('is_given_card') ?? false;
        $visitor->detained_items = request('detained_items') ?? null;
        $visitor->save();
        return back();
    }

    public function out($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->out_at = date('Y-m-d H:i:s P');
        $visitor->save();
        return back();
    }

    // API
    public function get_visitor(){

    }
}
