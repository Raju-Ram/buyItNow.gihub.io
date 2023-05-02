@extends('admin/layout')
@section('page_title','manage size')
@section('size_select','active')
@section('container')
<h1 >Manage size</h1> 
<a href="{{url('admin/size')}}">
<button type="button" class="btn btn-success">BACK</button>

</a>
     <div class="row m-t-30">
        <div class="col-md-12">
    
{{session('message')}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
         
                                    <div class="card-body">
                                       
                                        <form action="{{route('size.manage_size_process')}}" method="post" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">size</label>
                                                <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('size')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
										</div>
                                                @enderror
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