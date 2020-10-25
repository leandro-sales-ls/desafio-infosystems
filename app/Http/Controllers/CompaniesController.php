<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Repositories\CompaniesRepository;

use Illuminate\Database\Eloquent\Model;

class CompaniesController extends Controller
{

    public function index()
    {
        $companies = new CompaniesRepository;
        $companies = $companies->findAll();

        return view('pages.companies.companies', [
            'companies' => $companies
        ]);
    }

    public function store(Request $request)
    {

        try{
            $data = $request->all();
            $companies = new Companies;
            $companies->fill($data);

            if($companies->save()){
                $alert = ['status' => 'success', 'message' => 'Company cadastrado com sucesso!'];
            }
            else {
                $alert = ['status' => 'error', 'message' => 'Erro ao salvar companies!'];
            }

        }catch(\Exception $e){
            $alert = ['status' => 'error', 'message' => 'Erro ao salvar companies! <br>'. substr($e->getMessage(), 0, 70)];
            
        }

        return view('pages.companies.companies-create',
            [
                'companies'  => $companies,
                'alert' => $alert,
            ]
        );
    }

    public function edit($id)
    {
        $error = "";

        $repository = new CompaniesRepository;
        $companies = $repository->find($id);
        

        if (!$companies )
        {
            $error = "companies não encontrado";
        }

        return view('pages.companies.companies-edit', [
            'companies' => $companies,
        ]);

    }

    public function update($id, Request $request)
    {
        $error = "";
        $alert = "";

        $data = $request->all();

        $companies = Companies::find($id);

        if (!$companies)
        {
            $error = "Employees não encontrado";

        } else {

            $companies->fill($data);

            try {

                $companies->save();
                $alert = ['status' => 'success', 'message' => 'Employees editado com sucesso!'];

            }catch(\Exception $e){
                DB::rollback();
                $alert = ['status' => 'error', 'message' => 'Erro ao salvar companies! <br>'. substr($e->getMessage(), 0, 70)];
            }

        }

        $companies = new CompaniesRepository;
        $companies = $companies->findAll();

        return redirect()->route('companies', ['alert'=> $alert]);

    }

   /**
     *
     * @param  \App\Companies
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $error = "";
        $data = "";
        $alert = "";

        $repository = new CompaniesRepository;
        $companies = $repository->find($id);

        if (!$companies)
        {
            $error = "Employees não encontrado";

        } else {
            try {
                $companies->delete();
                $alert = ['status' => 'success', 'message' => 'Employees excluido com sucesso!'];
            }catch(\Exception $e){
                $alert = ['status' => 'error', 'message' => 'Erro ao excluir Employees! <br>'. substr($e->getMessage(), 0, 70)];
            }
        }

        $companies = new CompaniesRepository;
        $companies = $companies->findAll();

        return redirect()->route('companies', ['alert'=> $alert]);

    }

}
