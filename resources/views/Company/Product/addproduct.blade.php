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
                <div class="float-right"><a href="/company/product" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/product/add" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                      <label for="Category_name">Category Name</label>
                      <select name="cName" id="" class="form-control">
                        @foreach ($data['category'] as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                      </select>
                      @error('cName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div> --}}
                    <div class="form-group">
                      <label for="Category_name">Product Name</label>
                      <input type="text" name="pName" class="form-control">
                      @error('pName')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">HSN Code</label>
                      <input type="text" name="hsncode" class="form-control">
                      @error('hsncode')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Base Price</label>
                      <input type="text" name="baseprice" class="form-control">
                      @error('baseprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Stokist Price</label>
                      <input type="text" name="sprice" class="form-control">
                      @error('sprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Destributor Price</label>
                      <input type="text" name="dprice" class="form-control">
                      @error('dprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Retailor Price</label>
                      <input type="text" name="rprice" class="form-control">
                      @error('rprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Description</label>
                      <textarea type="text" name="description" class="form-control" rows="6"></textarea>
                      @error('description')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="Category_name">Product Banner</label>
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