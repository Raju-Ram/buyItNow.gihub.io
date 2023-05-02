@extends('admin/layout')
@section('page_title','product')
@section('product_select','active')

@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
{{session('message')}}

</div>
@endif
<h1>Product</h1>
<a href="{{url('admin/product/manage_product')}}">
<button type="button" class="btn btn-success">ADD Product</button>

</a>
<div class="row m-t-30">
   <div class="col-md-12">
    <div class="table-responsive m-b-40">
       <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Slug </th>
                                                    <th>Image </th>
                                                    <th>Action</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->slug}}</td>
                                                <td><img width="100" height="100" src="{{asset('storage/media/'.$list->image)}}"/></td>
                                                 <td>
                                                 <a href="{{url('admin/product/delete')}}/{{$list->id}}" class="btn btn-danger">DELETE</a>
                                                 <a href="{{url('admin/product/manage_product')}}/{{$list->id}}" class="btn btn-success">Edit</a>
                                                 @if($list->status==1)
                                                 <a href="{{url('admin/product/status/0')}}/{{$list->id}}" class="btn btn-primary">Active</a>

                                                 @elseif($list->status==0)
                                                 <a href="{{url('admin/product/status/1')}}/{{$list->id}}" class="btn btn-warning">Deactive</a>
                                                 @endif
                                                 </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                                
                                 
                            
                            </div>
                              
                                   
                       
@endsection