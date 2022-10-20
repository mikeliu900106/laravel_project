<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('In.Company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        function get_company_id(){
            $today = date("Ynj");
            $nums = company::count();
            $id = "C" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $companydata = $request -> validate([
            'company_name' => 'required|string',
            'company_title' => 'required|string',
            'company_number' => 'required|min:8|max:10',
            'company_place' => 'required|string',
            'company_email' => 'required|email',
            'company_username' => 'required|string',
            'company_password' => 'required|string',
        ]);
        $Company_id = get_company_id();
        echo $companydata['company_username'];
        $Company_username_isUse = Company::where('company_username', $companydata['company_username'])->first();
        echo $Company_username_isUse;
        if($Company_username_isUse == NULL){
            $Company_insert = Company::create(
                [
                    'company_id'            =>  $Company_id,
                    'company_name'          =>  $companydata['company_name'],
                    'company_title'         =>  $companydata['company_title'],
                    'company_username'      =>  $companydata['company_username'],
                    'company_password'      =>  $companydata['company_password'],
                    'company_number'        =>  $companydata['company_number'],
                    'company_email'         =>  $companydata['company_email'],
                    'level'                 =>  "3",
                ]
            );
            return view('index');
        }else{
            //errorcontroller
            echo "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
