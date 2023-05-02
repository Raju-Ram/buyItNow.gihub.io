<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']=product::all();
        return view('admin/product',$result);
    } 

    
    public function manage_product(Request $request,$id='')
    {
        if($id>0){
            $arr=product::where(['id'=>$id])->get();
           
            $result['product']=$arr['0']->product;
            $result['name']=$arr['0']->name;
            $result['category']=$arr['0']->category;
            $result['category_id']=$arr['0']->category_id;
            $result['image']=$arr['0']->image;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['uses']=$arr['0']->uses;
            $result['warranty']=$arr['0']->warranty;

            $result['lead_time']=$arr['0']->lead_time;
            $result['tax']=$arr['0']->tax;
            $result['tax_type']=$arr['0']->tax_type;
            $result['is_promo']=$arr['0']->is_promo;
            $result['is_featured']=$arr['0']->is_featured;
            $result['is_discounted']=$arr['0']->is_discounted;
            $result['is_tranding']=$arr['0']->is_tranding;

            $result['status']=$arr['0']->status;
            $result['id']=$id;

            // echo "<pre>";
            // print_r($arr['0']->$id);
            // die();
            $result['productAttrarr']=DB::table('products_attr')->where(['products_id'=>$id])->get();
      
        }else{
            
            $result['product']='';
            $result['name']='';
            $result['category_id']='';
            $result['image']='';
            $result['slug']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warranty']='';
            
            $result['lead_time']='';
            $result['tax']='';
            $result['tax_type']='';
            $result['is_promo']='';
            $result['is_featured']='';
            $result['is_discounted']='';
            $result['is_tranding']='';
            $result['status']='';
            $result['id']=0;

           
           $result['productAttrarr'][0]['products_id']='';
           $result['productAttrarr'][0]['sku']='';
           $result['productAttrarr'][0]['attr_image']='';
           $result['productAttrarr'][0]['mrp']='';
           $result['productAttrarr'][0]['price']='';
           $result['productAttrarr'][0]['qty']='';
           $result['productAttrarr'][0]['size_id']='';
           $result['productAttrarr'][0]['color_id']='';
           
// echo '<pre>';
// print_r($result['productAttrArr']);
// die();
              }

              $result['category']=DB::table('categories')->where(['status'=>1])->get();
     


              $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();
      

              $result['colors']=DB::table('colors')->where(['status'=>1])->get();
              return view('admin/manage_product',$result);
    }
    
    public function manage_product_process(request $request)
    {
        // return $request->post();
        // echo '<pre>';
        // print_r($request->post());
        // die();
        if($request->post('id')>0){
         $image_validation="mimes:jpeg,jpg,png";  
        }else{
          $image_validation="required|mimes:jpeg,jpg,png"; 
        }
        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
        ]);
        $model=new product();
        if($request->post('id')>0){
            $model=product::find($request->post('id'));
            $msg="product updated";
          }else{
            $model=new product();
            $msg="product insrted";
        }
        if($request->hasfile('image')){
$image=$request->file('image');
$ext=$image->extension();
$image_name=time().'.'.$ext;
$image->storeAs('/public/media',$image_name);
$model->image=$image_name;
        }
        $model->category_id=$request->post('category_id');
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
        $model->technical_specification=$request->post('technical_specification');
        $model->uses=$request->post('uses');
        $model->warranty=$request->post('warranty');
        $model->lead_time=$request->post('lead_time');
        $model->tax=$request->post('tax');
        $model->tax_type=$request->post('tax_type');
        $model->is_promo=$request->post('is_promo');
        $model->is_featured=$request->post('is_featured');
        $model->is_discounted=$request->post('is_discounted');
        $model->is_tranding=$request->post('is_tranding');

        $model->status=1;
        $model->save();
        $pid=$model->id;
     



        /*product attr start*/

         $skuArr=$request->post('sku');
         $mrpArr=$request->post('mrp');
         $priceArr=$request->post('price');
         $qtyArr=$request->post('qty');
         $size_idArr=$request->post('size_id');
         $color_idArr=$request->post('color_id');
      
         foreach($skuArr as $key=>$val){
            $productAttrArr['products_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['attr_image']='test';
            $productAttrArr['mrp']=$mrpArr[$key];
            $productAttrArr['price']=$priceArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
            if($size_idArr[$key]==''){
                $productAttrArr['size_id']=0;
            }else{
                $productAttrArr['size_id']=$size_idArr[$key];
            }


            if($color_idArr[$key]==''){
                $productAttrArr['color_id']=0;
            }else{
                $productAttrArr['color_id']=$color_idArr[$key];
            }

           
            DB::table('products_attr')->insert($productAttrArr);
        }

 

           
        /*product attr end*/
       


        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }
public function delete(Request $request,$id){
   $model=product::find($id);
   $model->delete();
   $request->session()->flash('message','Category deleted');
   return redirect('admin/product');

}
public function status(Request $request,$status,$id){
   $model=product::find($id);
   $model->status=$status;
   $model->save();
   $request->session()->flash('message','product status updated');
   return redirect('admin/product');

}
}
