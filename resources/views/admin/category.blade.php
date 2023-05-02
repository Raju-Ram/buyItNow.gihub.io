@extends('admin/layout')
@section('page_title','category')
@section('category_select','active')

@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
{{session('message')}}

</div>
@endif
<h1>category</h1>
<a href="{{url('admin/category/manage_category')}}">
<button type="button" class="btn btn-success">ADD CATEGORY</button>

</a>
<div class="row m-t-30">
   <div class="col-md-12">
    <div class="table-responsive m-b-40">
       <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Category Slug </th>
                                                    <th>category_image </th>
                                                    <th>Action</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->category_name}}</td>
                                                <td>{{$list->category_slug}}</td>
                                                <td><img width="100" height="100" src="{{asset('storage/media/category/'.$list->category_image)}}"/></td>

                                                 <td>
                                                 <a href="{{url('admin/category/delete')}}/{{$list->id}}" class="btn btn-danger">DELETE</a>
                                                 <a href="{{url('admin/category/manage_category')}}/{{$list->id}}" class="btn btn-success">Edit</a>
                                                 @if($list->status==1)
                                                 <a href="{{url('admin/category/status/0')}}/{{$list->id}}" class="btn btn-primary">Active</a>

                                                 @elseif($list->status==0)
                                                 <a href="{{url('admin/category/status/1')}}/{{$list->id}}" class="btn btn-warning">Deactive</a>
                                                 @endif
                                                 </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                                
                                 
                            
                            </div>
                              
                                   
                       
@endsection