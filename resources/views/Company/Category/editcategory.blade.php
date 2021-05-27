@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SKU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SKU</a></li>
              <li class="breadcrumb-item active">Edit SKU</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
               <b>Edit SKU</b> 
                <div class="float-right"><a href="/company/category" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failer'))
                <div class="badge badge-danger">{{session('failer')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/category/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['category']->id}}">
                    <input type="hidden" name="oldimg" value="{{$data['category']->category_image}}">
                    <div class="form-group">
                      <label for="Category_name">SKU Name</label>
                      
                      <input type="text" name="cName" class="form-control" value="{{$data['category']->category_name}}">
                      @error('cName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">

                      <label for="Category_name" class="d-block p-2">SKU Banner</label>
                      <img class=" img-fluid d-block p-2" src="{{url('/')}}/assets/categories/{{$data['category']->category_image}}" height="150px" width="250px" alt="">
                      <input type="file" name="cImage" class="form-control">
                      @error('cName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                  </form>
              </div>
            </div>
          </div>
         
        </div>
       
      </div>
    </div>
    
  </div>
 
@endsection