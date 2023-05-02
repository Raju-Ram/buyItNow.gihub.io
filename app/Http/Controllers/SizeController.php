<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
         $result['data']=Size::all();
         return view('admin/size',$result);
     } 
 
     
     public function manage_size(Request $request,$id='')
     {
         if($id>0){
             $arr=Size::where(['id'=>$id])->get();
 
             $result['size']=$arr['0']->size;
             $result['status']=$arr['0']->status;
             $result['id']=$id;
 
             // echo "<pre>";
             // print_r($arr['0']->$id);
             // die();
 
          
         }else{
             $result['size']='';
             $result['status']='';
             $result['id']=0;
               }
         return view('admin/manage_size',$result);
     }
     
     public function manage_size_process(request $request)
     {
             $request->validate([
             'size'=>'required|unique:sizes,size,'.$request->post('id'),
         ]);
         $model=new Size();
       
         if($request->post('id')>0){
             $model=Size::find($request->post('id'));
             $msg="size updated";
           }
           else{
             $model=new Size();
             $msg="size insrted";
         }
         $model->size=$request->post('size');
         $model->status=1;
         $model->save();
         $request->session()->flash('message',$msg);
         return redirect('admin/size');
     }
 public function delete(Request $request,$id){
    $model=Size::find($id);
    $model->delete();
    $request->session()->flash('message','Size deleted');
    return redirect('admin/size');
 
 }
 public function status(Request $request,$status,$id){
    $model=Size::find($id);
    $model->status=$status;
    $model->save();
    $request->session()->flash('message','size status updated');
    return redirect('admin/size');
 
 }
 }