<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Repositories\EmployeesRepository;
use App\Repositories\CompaniesRepository;

use Illuminate\Database\Eloquent\Model;

class EmployeesController extends Controller
{

    public function index()
    {
        $employee = new EmployeesRepository;
        $employee = $employee->joinFindAll();

        return view('pages.employee.employee', [
            'employee' => $employee
        ]);
    }

    public function create()
    {
        $companies = new CompaniesRepository;
        $companies = $companies->findAll();
        return view('pages.employee.employee-create', [
            'companies' => $companies
        ]);
    }

    public function store(Request $request)
    {
        try{

            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' =>  'required|max:255',
                'id_company' => 'required',
            ]);

            $data = $request->all();
            $employee = new Employees;
            $employee->fill($data);

            if($employee->save()){
                $alert = [
                    'status' => 'success', 
                    'message' => 'Employees cadastrado com sucesso!'
                ];
            }
            else {
                $alert = [
                    'status' => 'error', 
                    'message' => 'Erro ao salvar employee!'
                ];
            }

        }catch(\Exception $e){
            $alert = [
                'status' => 'error', 
                'message' => 'Erro ao salvar employee! <br>'. substr($e->getMessage(), 0, 70)
            ];    
        }

        $employee = new EmployeesRepository;
        $employee = $employee->joinFindAll();
        $companies = new CompaniesRepository;
        $companies = $companies->findAll();

        return view('pages.employee.employee-create',
            [
                'employee'  => $employee,
                'alert' => $alert,
                'companies' => $companies
            ]
        );
    }

    public function edit($id)
    {
        $error = "";

        $repository = new EmployeesRepository;
        $employee = $repository->find($id);
        
        $companies = new CompaniesRepository;
        $companies = $companies->findAll();

        if (!$employee )
        {
            $error = "employee não encontrado";
        }

        return view('pages.employee.employee-edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);

    }

    public function update($id, Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' =>  'required|max:255',
            'id_company' => 'required',
        ]);

        $error = "";
        $alert = "";

        $data = $request->all();

        $employee = Employees::find($id);

        if (!$employee)
        {
            $error = "Employees não encontrado";

        } else {

            $employee->fill($data);

            try {

                $employee->save();
                $alert = [
                    'status' => 'success', 
                    'message' => 'Employees editado com sucesso!'
                ];

            }catch(\Exception $e){
                DB::rollback();
                $alert = [
                    'status' => 'error', 
                    'message' => 'Erro ao salvar employee! <br>'. substr($e->getMessage(), 0, 70)
                ];
            }

        }

        $employee = new EmployeesRepository;
        $employee = $employee->joinFindAll();

        return redirect()->route('employee', ['alert'=> $alert]);

    }

   /**
     *
     * @param  \App\Employees
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $error = "";
        $data = "";
        $alert = "";

        $repository = new EmployeesRepository;
        $employee = $repository->find($id);

        if (!$employee)
        {
            $error = "Employees não encontrado";

        } else {
            try {
                $employee->delete();
                $alert = [
                    'status' => 'success', 
                    'message' => 'Employees excluido com sucesso!'
                ];
            }catch(\Exception $e){
                $alert = [
                    'status' => 'error', 
                    'message' => 'Erro ao excluir Employees! <br>'. substr($e->getMessage(), 0, 70)
                ];
            }
        }

        $employee = new EmployeesRepository;
        $employee = $employee->joinFindAll();

        return redirect()->route('employee', ['alert'=> $alert]);

    }

}
