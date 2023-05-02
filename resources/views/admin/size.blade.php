@extends('admin/layout')
@section('page_title','Size')
@section('size_select','active')

@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
{{session('message')}}

</div>
@endif
<h1>Size</h1>
<a href="{{url('admin/size/manage_size')}}">
<button type="button" class="btn btn-success">ADD Size</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
    <div class="table-responsive m-b-40">
       <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                    <th>ID</th>
                                                    <th>Size</th>
                                                    <th>Action</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->size}}</td>
                                                
                                                 <td>
                                                 <a href="{{url('admin/size/delete')}}/{{$list->id}}" class="btn btn-danger">DELETE</a>
                                                 <a href="{{url('admin/size/manage_size')}}/{{$list->id}}" class="btn btn-success">Edit</a>
                                                 @if($list->status==1)
                                                 <a href="{{url('admin/size/status/0')}}/{{$list->id}}" class="btn btn-primary">Active</a>

                                                 @elseif($list->status==0)
                                                 <a href="{{url('admin/size/status/1')}}/{{$list->id}}" class="btn btn-warning">Deactive</a>
                                                 @endif
                                                 </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                                
                                 
                            
                            </div>
                              
                                   
                       
@endsection