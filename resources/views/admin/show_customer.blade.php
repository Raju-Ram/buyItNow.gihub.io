@extends('admin/layout')
@section('page_title','show customer detailes')
@section('customer_select','active')

@section('container')

<h1>Customer Detailes</h1>


<div class="row m-t-30">
   <div class="col-md-12">
    <div class="table-responsive m-b-40">
       <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                    <th>Field</th>
                                                    <th>Value</th>
                                                  
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>
                                             <td>Name</td>
                                             <td>{{$customer_list->name}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Email</td>
                                             <td>{{$customer_list->email}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Mobile</td>
                                             <td>{{$customer_list->mobile}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Address</td>
                                             <td>{{$customer_list->address}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>City</td>
                                             <td>{{$customer_list->city}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>State</td>
                                             <td>{{$customer_list->state}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Zip</td>
                                             <td>{{$customer_list->zip}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>company</td>
                                             <td>{{$customer_list->company}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Gstin</td>
                                             <td>{{$customer_list->gstin}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Added ON</td>
                                             <td>{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-y h:i:s')}}</td>
                                            </tr>
                                        
                                            <tr>
                                             <td>Updated On </td>
                                             <td>{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-y h:i:s')}}</td>
                                          
                                            </tr>
                                        
                                          </tbody>
                                    </table>
                                </div>
                                
                                 
                            
                            </div>
                              
                                   
                       
@endsection