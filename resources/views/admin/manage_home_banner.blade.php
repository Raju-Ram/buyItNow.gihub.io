@extends('admin/layout')
@section('page_title','manage Home Banner')
@section('home_banner_select','active')
@section('container')
@php
if($id>0){
$image_required="";
}
else{
$image_required="required";
}
@endphp
<h1 >Manage Home Banner</h1>
<a href="{{url('admin/home_banner')}}">
<button type="button" class="btn btn-success">BACK</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
      {{session('message')}}
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                     @csrf
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-4">
                              <label for="btn_text" class="control-label mb-1">Btn Text</label>
                              <input id="btn_text" value="{{$btn_text}}" name="btn_text" type="text" class="form-control" aria-required="true" aria-invalid="false">
                           </div>
                           <div class="col-md-4">
                              <label for="btn_link" class="control-label mb-1">Btn Link</label>
                              <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-12">
                              <label for="image" class="control-label mb-1">Image</label>
                              <input id="image"  name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                              @error('image')
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