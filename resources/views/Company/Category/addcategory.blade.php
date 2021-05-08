@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
               <b>Add Category</b> 
                <div class="float-right"><a href="/company/category" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/category/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="Category_name">Category Name</label>
                      <input type="text" name="cName" class="form-control">
                      @error('cName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Category Banner</label>
                      <input type="file" name="cImage" class="form-control">
                      @error('cImage')
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