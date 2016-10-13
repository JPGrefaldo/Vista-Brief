<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Department;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


class DepartmentController extends Controller
{
    public function index() {
    	$departments = Department::all();

    	return view ('departments.index', compact('departments'));
    }

    public function postNewDepartment(Request $request) {

    	$messages = [
            'email'     =>  'The email you entered is not real.',
        ];

        $validator = Validator::make($request->all(),[
            'name'      =>  'bail|required|unique:departments,name',
            'email'     =>  'bail|required|email|unique:departments,email',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                'success'   => false,
                'message'   => $errors
            ], 422);
            return 'may mali';
        }
        
        $department = new Department();
        $department->name = $request->input('name');
        $department->email = $request->input('email');
        $department->save();

        return 'success';
    }
}
