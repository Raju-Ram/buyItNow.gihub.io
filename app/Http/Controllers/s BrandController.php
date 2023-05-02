<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']=brand::all();
        return view('admin/brand',$result);
    } 

    
    public function manage_brand(Request $request,$id='')
    {
        if($id>0){
            $arr=brand::where(['id'=>$id])->get();

            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->$id;

            // echo "<pre>";
            // print_r($arr['0']->$id);
            // die();

         
        }else{
            $result['name']='';
            $result['image']='';
            $result['status']='';
            $result['id']=0;
              }
        return view('admin\manage_brand',$result);
    }
    
    public function manage_brand_process(request $request)
    {
        // return $request->post();
       
           $request->validate([
            'name'=>'required|unique:brands,name,'.$request->post('id'),
              
               'image'=>'mimes:jpeg,jpg,png'
               
           ]);
       
   
        if($request->post('id')>0){
            $model=brand::find($request->post('id'));
            $msg="brand updated";
          }else{
            $model=new brand();
            $msg="brand insrted";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/model',$image_name);
            $model->image=$image_name;
                    }



        $model->brand=$request->post('brand');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }
public function delete(Request $request,$id){
   $model=brand::find($id);
   $model->delete();
   $request->session()->flash('message','brand deleted'
);
   return redirect('admin/brand');

}
public function status(Request $request,$status,$id){
   $model=brand::find($id);
   $model->status=$status;
   $model->save();
   $request->session()->flash('message','brand status updated');
   return redirect('admin/brand');

}
}
