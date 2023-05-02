@extends('admin/layout')
@section('page_title','manage coupon')
@section('coupon_select','active')
@section('container')
<h1 >Manage coupon</h1> 
<a href="{{url('admin/coupon')}}">
<button type="button" class="btn btn-success">BACK</button>

</a>
     <div class="row m-t-30">
        <div class="col-md-12">
    
{{session('message')}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
         
                                    <div class="card-body">
                                       
                                        <form action="{{route('coupon.manage_coupon_process')}}" method="post" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <label for="tital" class="control-label mb-1">Tital</label>
                                                <input id="tital" value="{{$tital}}" name="tital" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('tital')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
										</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                            <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('code')
                                                
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
                                            <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('value')
                                                
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
										</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                            <label for="type" class="control-label mb-1">Type</label>
                                        
                                                <select id="type" name="type" class="form-control" required >
                        @if($type=='value')
                        <option value="value"selected>value</option>
                        <option value="per">per</option>
                        @elseif($type=='per')
                        <option value="value"selected>value</option>
                        <option value="per"selected>per</option>
                        @else
                        <option value="value">value</option>
                        <option value="per">per</option>
                        @endif 
                     
                   </select>

                                            </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <label for="min_order_amt" class="control-label mb-1">Min Order Amt	</label>
                                                <input id="min_order_amt" value="{{$min_order_amt}}" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            
                                            </div>
                                            <div class="col-md-6">
                                            <label for="is_one_time" class="control-label mb-1">Is One Time</label>
              
                                                <select id="is_one_time" name="is_one_time" class="form-control" required >
                        @if($is_one_time=='1')
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