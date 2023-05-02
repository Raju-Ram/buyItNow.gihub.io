@extends('admin/layout')
@section('page_title','customer')
@section('customer_select','active')

@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
{{session('message')}}

</div>
@endif
<h1>Customer</h1>
<a href="{{url('admin/customer/customer_size')}}">

<div class="row m-t-30">
   <div class="col-md-12">
    <div class="table-responsive m-b-40">
       <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                    <th>ID</th>
                                                    <th>name</th>
                                                    <th>email</th>
                                                    <th>mobile</th>
                                                    <th>city</th>
                                                    <th>company</th>
                                                    <th>Details</th>
                                                    <th>Action</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->mobile}}</td>
                                                <td>{{$list->city}}</td>
                                                <td>{{$list->company}}</td>
                                                
                                                 <td>
                                                
                                                 <a href="{{url('admin/customer/show')}}/{{$list->id}}" class="btn btn-success">view</a>
                                                 <td>
                                                 @if($list->status==1)

                                                
                                                 <a href="{{url('admin/customer/status/0')}}/{{$list->id}}" class="btn btn-primary">Active</a>
                                                 </td>
                                                 @elseif($list->status==0)
                                                 <a href="{{url('admin/customer/status/1')}}/{{$list->id}}" class="btn btn-warning">Deactive</a>
                                                 @endif
                                               
                                         
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                                
                                 
                            
                            </div>
                              
                                   
                       
@endsection