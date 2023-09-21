<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function getCompany(){
        try{
            $company = Company::all();
            return response()->json([
                'status' => 'success',
                'data' => $company
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function store(){
        try{
            $data = [
                'name' => request('name')
            ];
            $company = Company::create($data);
            return response()->json([
                'status' => 'success',
                'data' => $company
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'error',
                // 'message' => 'Something went wrong'
                'message' => $e->getMessage()
            ]);
        }
    }
}
