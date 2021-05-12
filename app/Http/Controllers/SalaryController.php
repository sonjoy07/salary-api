<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\BankInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = $this->guard()->user();
    }

    public function salarySheet(){
        $salaries = Salary::all();
        $employee_salary = [];
        $total = 0;
        $company_balance = 0;
        if(count($salaries)>0){
            foreach($salaries as $key=>$salary){
                $total +=$salary->salary;
                $employee_salary[$key]['employee_name'] = $salary->employee->name;
                $employee_salary[$key]['grade'] = $salary->employee->grade;
                $employee_salary[$key]['company_account'] = $salary->bank->account_number;
                $employee_salary[$key]['salary'] = $salary->salary;
                $company_balance = $salary->bank->current_balance;
            }
        }
        return response()->json([
            'data' => $employee_salary,
            'status' => true,
            'total_salary' => $total,
            'company_balance' => $company_balance
        ]);
    }

    public function salary(Request $request){
        $validator = Validator::make($request->all(),[
            'basic_salary'=>'required|string',
            'balance'=>'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'not_complete'=>0,
                'errors'=>$validator->errors(),400
            ]);
        }
        $employees = Employee::all();
        $total_balance = $request->balance;
        foreach ($employees as $key => $employee) {
           $grade6 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100;
           $grade5 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +5000;
           $grade4 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*2);
           $grade3 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*3);
           $grade2 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*4);
           $grade1 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*5);
            $salary = new salary();
            if($employee->grade == 6){
                if(($total_balance- $grade6) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade6;
                    $total_balance = $total_balance- $grade6;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 5){
                if(($total_balance- $grade5) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade5;
                    $total_balance = $total_balance- $grade5;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 4){
                if(($total_balance- $grade4) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade4;
                    $total_balance = $total_balance- $grade4;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 3){
                if(($total_balance- $grade3) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade3;
                    $total_balance = $total_balance- $grade3;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 2){
                if(($total_balance- $grade2) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade2;
                    $total_balance = $total_balance- $grade2;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 1){
                if(($total_balance- $grade1) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade1;
                    $total_balance = $total_balance- $grade1;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
        

           

        }
        $bank = BankInfo::find($request->company_account);
        $bank->current_balance = $total_balance;
        $bank->update;
        return response()->json([
            'status'=>true,
            'not_complete'=>0,
            'message'=>'Salary save Successfully'
        ]);
    }
    public function onSaveLast(Request $request){
        $validator = Validator::make($request->all(),[
            'basic_salary'=>'required|string',
            'balance'=>'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'not_complete'=>0,
                'errors'=>$validator->errors(),400
            ]);
        }
        $employees = Employee::all();
        $total_balance = $request->balance;
        foreach ($employees as $key => $employee) {
            $is_exist = Salary::where('employee_id',$employee->id)->first();
            if(empty($is_exist)){
           $grade6 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100;
           $grade5 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +5000;
           $grade4 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*2);
           $grade3 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*3);
           $grade2 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*4);
           $grade1 = $request->basic_salary + ($request->basic_salary * 20)/100 + ($request->basic_salary * 15)/100 +(5000*5);
            $salary = new salary();
            if($employee->grade == 6){
                if(($total_balance- $grade6) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade6;
                    $total_balance = $total_balance- $grade6;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 5){
                if(($total_balance- $grade5) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade5;
                    $total_balance = $total_balance- $grade5;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 4){
                if(($total_balance- $grade4) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade4;
                    $total_balance = $total_balance- $grade4;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 3){
                if(($total_balance- $grade3) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade3;
                    $total_balance = $total_balance- $grade3;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 2){
                if(($total_balance- $grade2) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade2;
                    $total_balance = $total_balance- $grade2;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
            if($employee->grade == 1){
                if(($total_balance- $grade1) > 0 ){
                    $salary->employee_id = $employee->id;
                    $salary->company_account = $request->company_account;
                    $salary->salary = $grade1;
                    $total_balance = $total_balance- $grade1;
                    $salary->save();
                }else{
                    return response()->json([
                        'status'=>false,
                        'not_complete'=>1,
                        'message'=>'Oops account run out of money',
                    ]);
                }
            }
        }

           

        }
        $bank = BankInfo::find($request->company_account);
        $bank->current_balance = $total_balance;
        $bank->update;
        return response()->json([
            'status'=>true,
            'not_complete'=>0,
            'message'=>'Salary save Successfully'
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
