@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manufaturing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Create Manufacturing</li>
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
               <b>Add Manufacturing</b> 
                <div class="float-right"><a href="/company/manufacturing/{{$data['productid']->id}}" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/manufacturing/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pid" value="{{$data['productid']->id}}">
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
                      <label for="Category_name">SKU Name</label>
                      <select name="sku" id="" class="form-control">
                        @foreach ($data['sku'] as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                      </select>
                      @error('sku')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Manufacturing Code</label>
                      <input type="text" name="mcode" class="form-control">
                      @error('mcode')
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
                      <label for="Category_name">Total Production</label>
                      <input type="text" name="count" class="form-control">
                      @error('count')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    
                    
                    {{-- <div class="form-group">
                      <label for="Category_name">Product Banner</label>
                      <input type="file" name="pImage" class="form-control">
                      @error('pImage')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div> --}}
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