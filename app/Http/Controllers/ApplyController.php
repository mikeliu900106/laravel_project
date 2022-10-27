<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacancies;

use App\Models\Company;

use Session;

use DB;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '1') {
                $user_id = session()->get('user_id');
                $Vacancies = Vacancies::get();
                echo $user_id;
                //$Vacancies = Vacancies::where('teacher_watch','通過')->get();正式版本使用
                //echo $Vacancies;
                return view('IN.student.apply.index',[
                    'Vacancies'=> $Vacancies,
                    'user_id'  => $user_id,
                ]);
            }
            else{
                echo "你不是學生";
                //1. 顯示錯誤2.錯誤controller
                

            }
        }
        else{
            echo "你沒登入";
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id ,Request $request)
    {
        // $Vacancies = DB::table('vacancies')
        // ->join('company','company.company_id','=','vacancies.company_id')
        // ->select('vacancies.*','company.*')
        // ->get();
        // echo  $Vacancies;
        // return view("iN.Student.Apply.show",
        // [
        //     'Vacancies'=>$Vacancies,
        // ]
        // );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Vacancies = Vacancies::where('')->get();
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
    public function email($id)
    {
        //
    }
}
