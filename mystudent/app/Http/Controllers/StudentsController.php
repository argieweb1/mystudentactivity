<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function myView()
    {
        $students = Students::all();
        $users = User::all();

        return view('welcome', compact('students', 'users'));
    }


    public function addNewStudent(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
        ], [

            'fname.required' => 'First Name is Required*',
            'mname.required' => 'Middle Name is Required*',
            'lname.required' => 'Last Name is Required*',
            'age.required' => 'Age is Required*',
            'sex.required' => 'Sex is Required*',

        ]);

        $add_new = new Students;
        $add_new->id = $request->id;
        $add_new->fname = $request->fname;
        $add_new->mname = $request->mname;
        $add_new->lname = $request->lname;
        $add_new->age = $request->age;
        $add_new->sex = $request->sex;
        $add_new->save();



        return back()->with('success', 'Student added Successfully');
    }

    
    public function updateView($id)
    {
        $students = Students::where('id', '=', $id)->get();
        return view('update', compact('students'));
    }


    public function updateME(Request $request)
    {
        Students::where('id', '=', $request->id)->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'age' => $request->age,
            'sex' => $request->sex,
        ]);

        return redirect('/')->with('success', 'Student Updated Successfully');
    }

  public function deleteME($id)
{
    $student = Students::find($id);

    if ($student) {
        $middleInitial = $student->mname ? strtoupper(substr($student->mname, 0, 1)) . '.' : '';
        $studentName = $student->fname . ' ' . $middleInitial . ' ' . $student->lname;
        $student->delete();
        return back()->with('success', "Student '{$studentName}' (ID: {$id}) Deleted Successfully");
    } else {
        return back()->with('error', 'Student not found');
    }
}
}