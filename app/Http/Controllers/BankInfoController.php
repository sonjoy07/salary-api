<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankInfoController extends Controller
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
        $list = BankInfo::skip(0)->take(11)->get();
            return response()->json([
                'data' => $list,
                'status' => true
            ]);
    }
    public function get_bank()
    {
        $list = BankInfo::where('user_type',0)->get();
            return response()->json([
                'data' => $list,
                'status' => true
            ]);
    }
    public function get_bank_salary()
    {
        $list = BankInfo::where('user_type',1)->get();
            return response()->json([
                'data' => $list,
                'status' => true
            ]);
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
        // echo 'asdfasdf';die;
        $validator = Validator::make($request->all(),[
            'bank_name'=>'required|string',
            'branch_name'=>'required|string',
            'account_name'=>'required|string',
            'account_number'=>'required|numeric',
            'current_balance'=>'required|numeric',
            'account_type'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),400
            ]);
        }
        $bankInfo = new BankInfo();
        $bankInfo->bank_name = $request->bank_name;
        $bankInfo->branch_name = $request->branch_name;
        $bankInfo->account_name = $request->account_name;
        $bankInfo->account_number = $request->account_number;
        $bankInfo->current_balance = $request->current_balance;
        $bankInfo->account_type = $request->account_type;
        $bankInfo->user_type = $request->user_type;
        if($bankInfo->save()){
            return response()->json([
                'status'=>true,
                'message'=>'Bank Info save Successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankInfo  $bankInfo
     * @return \Illuminate\Http\Response
     */
    public function show(BankInfo $bankInfo)
    {
        return $bankInfo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankInfo  $bankInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return BankInfo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankInfo  $bankInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bankInfo = BankInfo::find($id);
        // dd($request);
        $validator = Validator::make($request->all(),[
            'bank_name'=>'required|string',
            'branch_name'=>'required|string',
            'account_name'=>'required|string',
            'account_number'=>'required|numeric',
            'current_balance'=>'required|numeric',
            'account_type'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),400
            ]);
        }
        $bankInfo->bank_name = $request->bank_name;
        $bankInfo->branch_name = $request->branch_name;
        $bankInfo->account_name = $request->account_name;
        $bankInfo->account_number = $request->account_number;
        $bankInfo->current_balance = $request->current_balance;
        $bankInfo->account_type = $request->account_type;
        $bankInfo->user_type = $request->user_type;
        if($bankInfo->update()){
            return response()->json([
                'status'=>true,
                'message'=>'Employee updated Successfully',
                'data'=> $bankInfo
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
     * @param  \App\Models\BankInfo  $bankInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankInfo = BankInfo::find($id);
        if($bankInfo->delete()){
            return response()->json([
                'status'=>true,
                'message'=>'Bank Info deleted successfully',
                'data' => $bankInfo
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Oops Bank Info could not be deleted',
            ]);
        }
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
