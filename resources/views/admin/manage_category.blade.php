@extends('admin/layout')
@section('page_title','manage category')
@section('category_select','active')
@section('container')


@php
if($id>0){
   $image_required="";
}

else{

   $image_required="required";
}



@endphp
<h1 >Manage Category</h1> 
<a href="{{url('admin/category')}}">
<button type="button" class="btn btn-success">BACK</button>

</a>
     <div class="row m-t-30">
        <div class="col-md-12">
    
{{session('message')}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
         
                                    <div class="card-body">
                                       
                                        <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                            <label for="Category_name" class="control-label mb-1">Category Name</label>
                                                <input id="Category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                              
                                                </div>
                                            <div class="col-md-4">
                                            <label for="Category_slug" class="control-label mb-1">Category slug</label>
                                                <input id="Category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                               
                                            </div>
                                           
                                            <div class="col-md-4">
                                            <label for="parent_category_id" class="control-label mb-1">Parent Category Id</label>
                                            <select id="parent_category_id" name="parent_category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              <option value="0">select categories</option>
                              @foreach($category as $list)
                              @if($parent_category_id==$list->id)
                              <option selected value="{{$list->id}}">
                                 @else
                              <option value="{{$list->id}}">
                                 @endif
                                 {{$list->category_name}}
                              </option>
                              @endforeach
                           </select>
                                            </div>
                                           
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-12">
                                            
                                            <label for="category_image" class="control-label mb-1">Category Image</label>
                           <input id="category_image"  name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                           @error('category_image')
                           <div class="alert alert-danger" role="alert">
                              {{$message}}
                           </div>
                           @enderror
                                              </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <label for="is_home" class="control-label mb-1">Show In Home Page</label>
                           <input id="is_home"  name="is_home" type="checkbox" checked {{$is_home_selected}}>
                           @error('category_image')
                           <div class="alert alert-danger" role="alert">
                              {{$message}}
                           </div>
                           @enderror
                                           
                                            </div>
                                            </div>
                                            </div>
                                           
                                     <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                                          submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
     </div>
    </div>
                              
                                   
                       
@endsection