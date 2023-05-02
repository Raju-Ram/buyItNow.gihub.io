@extends('admin/layout')
@section('page_title','Home Banner')
@section('home_banner_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
   {{session('message')}}
</div>
@endif
<h1>Home Banner</h1>
<a href="{{url('admin/home_banner/manage_home_banner')}}">
<button type="button" class="btn btn-success">ADD Home Banner</button>
</a>
<div class="row m-t-30">
<div class="col-md-12">
   <div class="table-responsive m-b-40">
      <table class="table table-borderless table-data3">
         <thead>
            <tr>
               <th>ID</th>
               <th>Btn Text</th>
               <th>Btn Link</th>
               <th>Image </th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($data as $list)
            <tr>
               <td>{{$list->id}}</td>
               <td>{{$list->btn_text}}</td>
               <td>{{$list->btn_link}}</td>
               <td>
                  <img width="100px" src="{{asset('storage/media/banner/'.$list->image)}}"/>
               </td>
               <td>
                  <a href="{{url('admin/home_banner/delete')}}/{{$list->id}}" class="btn btn-danger">DELETE</a>
                  <a href="{{url('admin/home_banner/manage_home_banner')}}/{{$list->id}}" class="btn btn-success">Edit</a>
                  @if($list->status==1)
                  <a href="{{url('admin/home_banner/status/0')}}/{{$list->id}}" class="btn btn-primary">Active</a>
                  @elseif($list->status==0)
                  <a href="{{url('admin/home_banner/status/1')}}/{{$list->id}}" class="btn btn-warning">Deactive</a>
                  @endif
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection