<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function index()
    {
        $result['data']=category::all();
        return view('admin/category',$result);
    } 

    
    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr=category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['parent_category_id']=$arr['0']->parent_category_id;
            $result['category_image']=$arr['0']->category_image;
            $result['is_home']=$arr['0']->is_home;
            $result['is_home_selected']="";
            if($arr['0']->is_home==1){
                $result['is_home_selected']="checked";
            }
         

   
            $result['id']=$id;

            // echo "<pre>";
            // print_r($arr['0']->$id);
            // die();

         
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['parent_category_id']='';
            $result['category_image']='';
            $result['is_home']='';
            $result['is_home_selected']="";
            $result['id']=0;
              }

              $result['category']=DB::table('categories')->where(['status'=>1])->get();

        return view('admin/manage_category',$result);
    }
    
    public function manage_category_process(request $request)
    {
        $model=new category();
        
        if($request->post('id')>0){
            $model=category::find($request->post('id'));
            $msg="category updated";
       
          }else{
             $request->validate([
            'category_name'=>'required',
            'category_image'=>'mimes:jpeg,jpg,png',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);
            $model=new category();
            $msg="category insrted";
        }
        if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/category',$image_name);
            $model->category_image=$image_name;
                    }
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->parent_category_id=$request->post('parent_category_id');
if($request->post('is_home')!==null){
    $model->is_home=1;
}
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }
public function delete(Request $request,$id){
   $model=category::find($id);
   $model->delete();
   $request->session()->flash('message','Category deleted');
   return redirect('admin/category');

}
public function status(Request $request,$status,$id){
   $model=category::find($id);
   $model->status=$status;
   $model->save();
   $request->session()->flash('message','Category status updated');
   return redirect('admin/category');

}
}