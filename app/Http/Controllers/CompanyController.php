<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller
{
  
    public function index()
    { 
            $company =Company::latest()->paginate(5);
        $i=1;
        return view('companies.index', compact('company'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }
 
    public function create()
    { 
        return view('companies.create');
    }
 
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required', 
        ]);
        Company::create($request->all());
        return redirect()->route('companies.index')
        ->with('success', 'Company created successfully.');
    }

     
    public function show(Company $company,$id)
    {
        $company=Company::find($id); 
        return view('companies.show', compact('company'));
    }

    
    public function edit(Company $company,$id)
    { 
        $company=Company::find($id); 
        return view('companies.edit', compact('company'));
    }

   
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $company=Company::find($id);
        $company->update($request->all());
        return redirect()->route('companies.index')
        ->with('success', 'Company updated successfully');
    }

    
    public function destroy($id)
    { 
       
        $employee=DB::table('employees')->where('company','=',$id)->count();
        if($employee != 0 ){
            return redirect()->route('companies.index')
            ->with('error', 'Cannot delete this company because it has registered employees');
        }else{
            Company::destroy($id);
            return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
        }
       
    }
}
