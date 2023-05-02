@extends('admin/layout')
@section('page_title','manage product')
@section('product_select','active')
@section('container')


@php
if($id>0){
   $image_required="";
}

else{

   $image_required="required";
}



@endphp
<h1 class="mb10" >Manage product</h1>
<a href="{{url('admin/product')}}">
<button type="button" class="btn btn-success">BACK</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
      <!-- {{session('message')}} -->

                  <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                    
                           <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                 @csrf

                     <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                           {{$message}}
                        </div>
                        @enderror
                     </div>




                     <div class="form-group">
                        <label for="slug" class="control-label mb-1">slug</label>
                        <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('slug')
                        <div class="alert alert-danger" role="alert">
                           {{$message}}
                        </div>
                        @enderror
</div>



                        <div class="form-group">
                           <label for="image" class="control-label mb-1">image</label>
                           <input id="image"  name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                           @error('image')
                           <div class="alert alert-danger" role="alert">
                              {{$message}}
                           </div>
                           @enderror
                        </div>



                        <div class="form-group">
                           <label for="category_id" class="control-label mb-1">category</label>
                           <select id="category_id" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              <option value="">select categories</option>
                              @foreach($category as $list)
                              @if($category_id==$list->id)
                              <option selected value="{{$list->id}}">
                                 @else
                              <option value="{{$list->id}}">
                                 @endif
                                 {{$list->category_name}}
                              </option>
                              @endforeach
                           </select>
                        </div>
                    



                     <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                        <label for="brand" class="control-label mb-1">brand</label>
                        <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>


                        
                        <div class="form-group">
                        <label for="model" class="control-label mb-1">model</label>
                        <input id="model"  value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                     </div>
                    
               </div>
               


               <div class="form-group">
               <label for="short_desc" class="control-label mb-1">short_desc</label>
               <textarea rows=""  id="short_desc[]"   name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required> {{$short_desc}}</textarea>
              
             </div>




               <div class="form-group">
               <label for="desc" class="control-label mb-1">desc</label>
               <textarea rows="" id="desc"  value="" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$desc}}</textarea>
               </div>
             


               <div class="form-group">
               <label for="keywords" class="control-label mb-1">keywords</label>
               <input id="keywords"  value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
               </div>


               <div class="form-group">
               <label for="technical_specification" class="control-label mb-1">technical_specification</label>
               <textarea id="technical_specification"  value="" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$technical_specification}}</textarea>
               </div>


               <div class="form-group">
               
                    
               <label for="uses" class="control-label mb-1">uses</label>
               <textarea id="uses"  value="" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$uses}}</textarea>
               </div>


               <div class="form-group">
               <label for="warranty" class="control-label mb-1">warranty</label>
               <textarea id="warranty"  value="" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$warranty}}</textarea>
               </div>


               <div class="form-group">
                  <div class="row">
                     <div class="col-md-4">
 
                    
                     <label for="lead_time" class="control-label mb-1">Lead Time</label>
                        <input id="lead_time"  value="{{$lead_time}}" name="tax" type="text" class="form-control" aria-required="true" aria-invalid="false">
                   

                      </div>
                      
                      <div class="col-md-4">

                      <label for="tax" class="control-label mb-1">Tax</label>
                        <input id="tax"  value="{{$tax}}" name="tax" type="text" class="form-control" aria-required="true" aria-invalid="false">
                   

                       </div>

                       <div class="col-md-4">

                       <label for="tax_type" class="control-label mb-1">Tax Type</label>
                        <input id="tax_type"  value="{{$tax_type}}" name="tax_type" type="text" class="form-control" aria-required="true" aria-invalid="false">
                   

                       </div>
                 </div>
              </div>

              
              <div class="form-group">
                  <div class="row">
                     <div class="col-md-3">
   
                     <label for="is_promo" class="control-label mb-1">Is Promo</label>
                     <select id="is_promo" name="is_promo" class="form-control" required >
                        @if($is_promo=='1')
                        <option value="1"selected>Yes</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0"selected>No</option>
                        @endif 
                     
                   </select>
                   </div>
                  
                   <div class="col-md-3">
                      <label for="is_featured" class="control-label mb-1">Is Featured</label>
                     <select id="is_featured" name="is_featured" class="form-control" required >
                     @if($is_promo=='1')
                        <option value="1"selected>Yes</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0"selected>No</option>
                        @endif
                   </select>
                   </div>
                      
                   <div class="col-md-3">
                       <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                     <select id="is_discounted" name="is_discounted" class="form-control" required >
                     @if($is_promo=='1')
                        <option value="1"selected>Yes</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0"selected>No</option>
                        @endif
                   </select>
                   </div> 
                 
                    
                       <div class="col-md-3">
                       <label for="is_tranding" class="control-label mb-1">Is Tranding</label>
                     <select id="is_tranding" name="is_tranding" class="form-control" required >
                     @if($is_promo=='1')
                        <option value="1"selected>Yes</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0"selected>No</option>
                        @endif
                   </select>
                   </div>
                    
                 </div>
              </div>
                     
               </div>
               </div>
               </div>
               </div>
</div>

 
                <h2 class="mb10">Product Attributes </h2>
               <div class="col-lg-12" id="product_attr_box">
              @php
              $loop_count_num=1
              @endphp
              @foreach($productAttrarr as $key=>$val)
              @php
              $pAArr=(array)$val
              @endphp
           
            <div class="card"  id="product_attr_1" >
               <div class="card-body">

            <div class="form-group">
                     <div class="row">
                     <div class="col-md-2">
                        <label for="sku" class="control-label mb-1">SKU</label>
                        <input id="sku" name="sku[]" type="text"  class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['sku']}}"required>
                     </div>

                     <div class="col-md-2">
                        <label for="mrp" class="control-label mb-1">MRP</label>
                        <input id="mrp"  name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['mrp']}}" required>
                     </div>

                     <div class="col-md-2">
                        <label for="price" class="control-label mb-1">PRICE</label>
                        <input id="price"  name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['price']}}"   required>
                     </div>

                     <div class="col-md-2">
                        <label for="qty" class="control-label mb-1">QTY</label>
                        <input id="qty"  name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['qty']}}"  required>
                     </div>

                     <div class="col-md-3">
                           <label for="size_id" class="control-label mb-1">Size</label>
                           <select id="size_id" name="size_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['size_id']}}" >
                              <option value="">select</option>
                              @foreach($sizes as $list)
                      
                              <option selected value="{{$list->id}}">{{$list->size}}
                             
                              </option>
                              @endforeach
                           </select>
                        </div>

                        <div class="col-md-3">
                           <label for="color_id" class="control-label mb-1">Color</label>
                           <select id="color_id" name="color_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['color_id']}}"  >
                              <option value="">select</option>
                              @foreach($colors as $list)
                      
                              <option selected value="{{$list->id}}">{{$list->color}}
                             
                              </option>
                              @endforeach
                           </select>
                        </div> 

                        <div class="col-md-4">
                           <label for="attr_image" class="control-label mb-1">image</label>
                           <input id="attr_image"  name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['attr_image']}}"  required>
                          

               </div>
               <div class="col-md-2">
                           <label for="color_id" class="control-label mb-1">Action</label>

                             <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                              <i class="fa fa-plus"></i>&nbsp; Add</button>
                        </div> 
               </div>
               </div>
               </div>

            
           
            </div>
            <input type="hidden" name="id" value="{{$id}}"/>
            @endforeach 
         </div>
      </div>
   </div>
   <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
      submit
   </button>
</form>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
   var loop_count=1;
   function add_more(){
loop_count++;
   


  var html='<div class="card" id="product_attr_'+loop_count+'"> <div class="card-body"> <div class="form-group"><div class="row"> ';
  
      html+='   <div class="col-md-2"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
      
                      
                     
                     html+='   <div class="col-md-2"><label for="mrp" class="control-label mb-1">MRP</label> <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>'; 

                 

                     html+='   <div class="col-md-2"><label for="qty" class="control-label mb-1">QTY</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>'; 
   
          

                     html+='<div class="col-md-2"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" ></div>'; 
                     var size_id_html=$('#size_id').html();
                     html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id"  name="size_id[]" class="form-control"required='+size_id_html+'></select></div>'; 
                     var color_id_html=$('#color_id').html();
                     html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1">Color</label><select id="color_id"  name="color_id[]" class="form-control"required='+color_id_html+'></select></div>';
                     html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>'; 
                     html+='<div class="col-md-2"><label for="attr_image" class="control-label mb-1">Action</label><button type="button"  name="attr_image[]" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")>   <i class="fa fa-minus"></i>&nbsp; Remove</button>';
                           
 
      
                                    
     html+='</div></div></div></div>';             
                  
  $('#product_attr_box').append(html)
}
function remove_more(loop_count){
                    
  $('#product_attr_'+loop_count).remove();
}

</script>

@endsection