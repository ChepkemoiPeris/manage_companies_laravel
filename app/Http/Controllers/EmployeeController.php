<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;
class EmployeeController extends Controller
{
  
    public function index()
    { 
        $employee =DB::table('employees as e')
                ->join('companies as c','e.company', '=', 'c.id') 
                ->select('e.id','c.id as c_id','c.name','e.first_name','e.last_name', 'e.company','e.email','e.phone','e.created_at')
                ->latest()->paginate(5);
        // $employee = Employee::join('company as c','=',latest()->paginate(5);
        $i=1;
        return view('employees.index', compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }
 
    public function create()
    {
        $company=Company::get();
        return view('employees.create',compact('company'));
    }
 
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')
        ->with('success', 'Employee created successfully.');
    }

     
    public function show(Employee $employee,$id)
    {
        $employee=Employee::find($id);
        $company=Company::find($employee->company);
        return view('employees.show', compact('employee','company'));
    }

    
    public function edit(Employee $employee,$id)
    { 
        $employee=Employee::find($id);
        $company=Company::get();
        return view('employees.edit', compact('employee','company'));
    }

   
    public function update(Request $request,$id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        $employee=Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')
        ->with('success', 'Employee updated successfully');
    }

    
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index')
        ->with('success', 'Employee deleted successfully');
    }
}
