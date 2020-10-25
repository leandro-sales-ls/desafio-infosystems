<?php

namespace App\Repositories;

use App\Employees;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EmployeesRepository 
{
	
	public function findAll()
	{
        return  Employees::all();
	}  
	
	public function find($id)
	{
        return  Employees::where('id', $id)->first();
	}  

	public function joinFindAll()
	{
        $employees = DB::table('employees')
            ->join('companies', 'employees.id_company', '=', 'companies.id')
            ->select('employees.*', 'companies.name')
			->paginate(10);
			
		return $employees;
	}  
	
}