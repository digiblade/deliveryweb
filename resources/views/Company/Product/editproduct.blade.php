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
                <div class="float-right"><a href="/company/product" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/product/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['product']->id}}">
                    <input type="hidden" name="oldimg" value="{{$data['product']->product_image}}">

                    <div class="form-group">
                      <label for="Category_name">Product Name</label>
                      <input type="text" name="pName" value="{{$data['product']->product_name}}" class="form-control">
                      @error('pName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">HSN Code</label>
                      <input type="text" name="hsncode" value="{{$data['product']->product_hsncode}}" class="form-control">
                      @error('hsncode')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Base Price</label>
                      <input type="text" name="baseprice" value="{{$data['product']->product_baseprice}}" class="form-control">
                      @error('baseprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Stokist Price</label>
                      <input type="text" name="sprice" value="{{$data['product']->product_stokistprice}}" class="form-control">
                      @error('sprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Destributor Price</label>
                      <input type="text" name="dprice" value="{{$data['product']->product_distributorprice}}" class="form-control">
                      @error('dprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Retailor Price</label>
                      <input type="text" name="rprice" value="{{$data['product']->product_retailerprice}}" class="form-control">
                      @error('rprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Description</label>
                      <textarea type="text" name="description"  class="form-control" rows="6">{{$data['product']->product_description}}</textarea>
                      @error('description')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="Category_name" class="d-block p-2">Product Banner</label>
                      <img class=" img-fluid d-block p-2" src="{{url('/')}}/assets/product/{{$data['product']->product_image}}" height="150px" width="250px" alt="">
                      
                      <input type="file" name="pImage" class="form-control">
                      @error('pImage')
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