<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('In.Teacher.index');
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
            function get_teacher_id(){
                $today = date("Ynj");
                $nums = Teacher::count();
                $id = "T" . (($today * 10000) + ($nums + 1));
                return $id;
            }
            $teacher_id = get_teacher_id();
            $teacherdata = $request -> validate([
                'teacher_username'  => 'required|string',
                'teacher_password'  => 'required|string',
                'teacher_real_name' => 'required|string|max:8',
                'teacher_email'     => 'required|email',
            ]);
            $teacher_username_isUse = Teacher::where('teacher_username', $teacherdata['teacher_username'])->first();
            if($teacher_username_isUse == NULL){
                $Teacher_insert = Teacher::create([
                    'teacher_id'        => $teacher_id,
                    'teacher_username'  => $teacherdata['teacher_username'],
                    'teacher_password'  => $teacherdata['teacher_password'],
                    'teacher_real_name' => $teacherdata['teacher_real_name'],
                    'teacher_email'     => $teacherdata['teacher_email'],
                    'teacher_level'     => '2',
                ]);
            }
            else{
                //errorcontroller
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
