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
              <li class="breadcrumb-item active">Edit Category</li>
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
               <b>Edit Category</b> 
                <div class="float-right"><a href="/company/subcategory" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/subcategory/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['subcategory']->subcategory_id}}">
                    <input type="hidden" name="oldimg" value="{{$data['subcategory']->subcategory_image}}">

                    <div class="form-group">
                      <label for="Category_name">Category Name</label>
                      <select name="cName" id="" class="form-control">
                        @foreach ($data['category'] as $item)
                            <option value="{{$item->id}}" {{ $data['subcategory']->category_id==$item->id?"selected":""}}>{{$item->category_name}}</option>
                        @endforeach
                      </select>
                      @error('cName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Subcategory Name</label>
                      <input type="text" name="sCName" class="form-control" value="{{$data['subcategory']->subcategory_name}}">
                      @error('sCName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name" class="d-block p-2">Subcategory Banner</label>
                      <img class=" img-fluid d-block p-2" src="{{url('/')}}/assets/subcategories/{{$data['subcategory']->subcategory_image}}" height="150px" width="250px" alt="">
                      
                      <input type="file" name="sCImage" class="form-control">
                      @error('sCImage')
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