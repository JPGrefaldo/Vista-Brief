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

    public function postNewDepartment(Request $request)
    {
        // if ( !$request::ajax() ) {
        //     return 'not ajax';
        // }

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
        }
        
        $department = new Department();
        $department->name = $request->input('name');
        $department->email = $request->input('email');
        $department->save();

        return 'success';
    }

    public function postEditDepartment(Request $request)
    {
        $messages = [
            'email'     =>  'The email you entered is not real.',
        ];

        $validator = Validator::make($request->all(),[
            'name'      =>  'bail|required|unique:departments,name,'.$request->input('id'),
            'email'     =>  'bail|required|email|unique:departments,email,'.$request->input('id'),
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                'success'   => false,
                'message'   => $errors
            ], 422);
        }
        
        $department = Department::find($request->input('id'));
        $department->name = $request->name;
        $department->email = $request->email;
        $department->save();

        return 'success';
    }

    public function postDeleteDepartment(Request $request)
    {
        if ( $department = Department::find($request->input('id')) ) {
            $department->delete();
        }        

        return 'success';
    }
}
