<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
     // export data format excel

    public function exportexcel(){
        return Excel::download(new TaskExport,'datapage.xlsx');
    }

    // import data format excel
    public function importexcel(Request $request){

        Excel::import(new TaskImport, $request->file);
        return redirect()->back();

    }
}
