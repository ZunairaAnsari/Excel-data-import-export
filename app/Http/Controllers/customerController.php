<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class customerController extends Controller
{
    //
    public function index(){
        return view('customer.index');
    }

    public function importExcelData(Request $request){
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls'  // Only allow excel files
            ]
            ]);
        Excel::import(new CustomerImport, $request->file('file'));

        return back()->with('status', 'Excel data has been successfully imported');
    }
}
