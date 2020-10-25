<?php

namespace App\Repositories;

use App\Companies;
use Illuminate\Database\Eloquent\Model;

class CompaniesRepository 
{
	
	public function findAll()
	{
        return  Companies::all();
	}  
	
	public function find($id)
	{
        return  Companies::where('id', $id)->first();
	}  
	
}