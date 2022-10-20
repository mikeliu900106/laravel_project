<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('In.Student.index');
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
        
        function get_student_id(){
            $today = date("Ynj");
            $nums = Student::count();
            echo $nums;
            $id = "U" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $student_id = get_student_id();
        $studentdata = $request -> validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
        ]);
        echo  $studentdata['username'];
        echo  $studentdata['password'];
        echo  $studentdata['email'];
        $Student_username_isUse = Student::where('user_name',  $studentdata['username'])->first();
        if($Student_username_isUse == NULL){
            $Student_insert = Student::create(
                [
                    'user_id'       =>  $student_id,
                    'user_name'     =>  $studentdata['username'],
                    'user_password' =>  $studentdata['password'],
                    'user_email'    =>  $studentdata['email'],
                    'user_level'         =>  "1",
                ]
            );
        }
        else{
            //error
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
