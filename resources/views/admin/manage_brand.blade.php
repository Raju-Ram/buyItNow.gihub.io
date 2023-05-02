@extends('admin/layout')
@section('page_title','manage brand')
@section('brand_select','active')
@section('container')




@error('image')
     <div class="alert alert-danger" role="alert">
       {{$message}}
<button type="button" class="close"
data-dismiss="alert"  >
</button>
@enderror
   </div>



<h1 >Manage brand</h1> 
<a href="{{url('admin/brand')}}">
<button type="button" class="btn btn-success">BACK</button>

</a>
     <div class="row m-t-30">
        <div class="col-md-12">
    
{{session('message')}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
         
                                    <div class="card-body">
                                       
                                        <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">brand</label>
                                                <input id="brand" value="{{$brand}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
										</div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                           <label for="image" class="control-label mb-1">image</label>
                           <input id="image"  name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                           @error('image')
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