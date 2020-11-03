<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;

class EmployeeController extends Controller
{

    public function showTable()
    {
        return view('home');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-sm btn-primary">Edit</a> <a href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
