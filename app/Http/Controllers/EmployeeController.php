<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = $this->guard()->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Employee::find(1)->bank['id']);
        $list = Employee::all();
        $employee = [];
        if(count($list)>0){
            foreach($list as $key=>$empl){
                $employee[$key]['id'] = $empl->id;
                $employee[$key]['name'] = $empl->name;
                $employee[$key]['employee_id'] = $empl->employee_id;
                $employee[$key]['grade'] = $empl->grade;
                $employee[$key]['address'] = $empl->address;
                $employee[$key]['mobile'] = $empl->mobile;
                $employee[$key]['account_number'] = $empl->bank->account_number;
            }
        }
            return response()->json([
                'data' => $employee,
                'status' => true
            ]);
    }

    protected function getEmployee(){
        $list = Employee::all();
        $employee = [];
        if(count($list)>0){
            foreach($list as $key=>$empl){
                $employee[$key]['id'] = $empl->id;
                $employee[$key]['name'] = $empl->name;
                $employee[$key]['employee_id'] = $empl->employee_id;
                $employee[$key]['grade'] = $empl->grade;
                $employee[$key]['address'] = $empl->address;
                $employee[$key]['mobile'] = $empl->mobile;
                $employee[$key]['account_number'] = $empl->bank->account_number;
            }
        }
        return $employee;
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
         // echo 'asdfasdf';die;
         $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'grade'=>'required|numeric',            
            'bank_info_id'=>'required|numeric',
            'mobile'=>'required|numeric|min:11',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),400
            ]);
        }
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->grade = $request->grade;
        $employee->address = $request->address;
        $employee->mobile = $request->mobile;
        $employee->bank_info_id = $request->bank_info_id;
        $employee->employee_id = rand(1000,9999);
        // dd($employee);
        if($employee->save()){
            return response()->json([
                'status'=>true,
                'message'=>'Employee saved Successfully',
                'data'=> $this->getEmployee(),
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Oops Employee could not be updated',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        return Employee::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'grade'=>'required|numeric',            
            'bank_info_id'=>'required|numeric',
            'mobile'=>'required|numeric|min:11',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),400
            ]);
        }
        $employee->name = $request->name;
        $employee->grade = $request->grade;
        $employee->address = $request->address;
        $employee->mobile = $request->mobile;
        $employee->bank_info_id = $request->bank_info_id;
        if($employee->update()){
            return response()->json([
                'status'=>true,
                'message'=>'Employee updated Successfully',
                'data'=> $this->getEmployee(),
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Oops Employee could not be updated',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee->delete()){
            return response()->json([
                'status'=>true,
                'message'=>'Employee deleted successfully',
                'data' => $this->getEmployee(),
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Oops Employee could not be deleted',
            ]);
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
