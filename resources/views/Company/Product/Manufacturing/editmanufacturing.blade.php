@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manufacturing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Edit Manufacturing</li>
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
               <b>Edit Manufacturing</b> 
                <div class="float-right"><a href="/company/manufacturing/{{$data['manufacturing']->manufacturing_productid}}" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/manufacturing/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['manufacturing']->manufacturing_id}}">

                    <div class="form-group">
                      <label for="Category_name">SKU Name</label>
                      <select name="sku" id="" class="form-control">
                        @foreach ($data['sku'] as $item)
                            <option value="{{$item->id}}" @if($data['manufacturing']->manufacturing_skuid==$item->id) selected @endif>{{$item->category_name}}</option>
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
                      <input type="text" name="mcode" value="{{$data['manufacturing']->manufacturing_code}}"class="form-control">
                      @error('mcode')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Base Price</label>
                      <input type="text" name="baseprice" value="{{$data['manufacturing']->manufacturing_baseprice}}" class="form-control">
                      @error('baseprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Stokist Price</label>
                      <input type="text" name="sprice" value="{{$data['manufacturing']->manufacturing_stokistprice}}" class="form-control">
                      @error('sprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Distributor Price</label>
                      <input type="text" name="dprice" value="{{$data['manufacturing']->manufacturing_distibutorprice}}" class="form-control">
                      @error('dprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Retailor Price</label>
                      <input type="text" name="rprice" value="{{$data['manufacturing']->manufacturing_retailerprice}}" class="form-control">
                      @error('rprice')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Total Production</label>
                      <input type="text" name="count" value="{{$data['manufacturing']->manufacturing_totalcount}}"class="form-control">
                      @error('count')
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