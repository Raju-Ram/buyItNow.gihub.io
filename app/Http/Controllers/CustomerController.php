<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']=customer::all();
        return view('admin/customer',$result);
    } 

    
    public function show(Request $request,$id='')
    {
        if($id>0){
            $arr=customer::where(['id'=>$id])->get();
            $result['customer_list']=$arr['0'];
        //   echo"<pre>";
        //   print_r($result['customer_list']);
        //   die();
           
         
        return view('admin/show_customer',$result);
    }
    
    }
    public function status(Request $request,$status,$id){
        $model=customer::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','customer status updated');
        return redirect('admin/customer');
     
     }
}
