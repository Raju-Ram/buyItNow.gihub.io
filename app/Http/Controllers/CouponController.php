<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
   
    public function index()
    {
        $result['data']=coupon::all();
        return view('admin/coupon',$result);
    } 

    
    public function manage_coupon(Request $request,$id='')
    {
        if($id>0){
            $arr=coupon::where(['id'=>$id])->get();

            $result['tital']=$arr['0']->tital;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['type']=$arr['0']->type;
            $result['min_order_amt']=$arr['0']->min_order_amt;
            $result['is_one_time']=$arr['0']->is_one_time;
            $result['id']=$id;

            // echo "<pre>";
            // print_r($arr['0']->$id);
            // die();

         
        }else{
            $result['tital']='';
            $result['code']='';
            $result['value']='';
            $result['type']='';
            $result['min_order_amt']='';
            $result['is_one_time']='';
            $result['id']=0;
              }
        return view('admin/manage_coupon',$result);
    }
    
    public function manage_coupon_process(request $request)
    {
        // return $request->post();
        $request->validate([
            'tital'=>'required',
            'value'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id'),
        ]);
        // $model=new category();
        if($request->post('id')>0){
            $model=coupon::find($request->post('id'));
            $msg="coupon updated";
          }else{
            $model=new coupon();
            $msg="category insrted";
            $model->status=1;
        }
        $model->tital=$request->post('tital');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->type=$request->post('type');
        $model->min_order_amt=$request->post('min_order_amt');
        $model->is_one_time=$request->post('is_one_time');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
public function delete(Request $request,$id){
   $model=coupon::find($id);
   $model->delete();
   $request->session()->flash('message','coupon deleted');
   return redirect('admin/coupon');

}

public function status(Request $request,$status,$id){
    $model=coupon::find($id);
    $model->status=$status;
    $model->save();
    $request->session()->flash('message','coupon status updated');
    return redirect('admin/coupon');
 
 }
}
