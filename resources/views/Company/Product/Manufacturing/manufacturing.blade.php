@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">View Manufacturing</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <div class="content">
      <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
          <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
          <h5>{{session('success')}}</h5>
        </div>
        @elseif(session('fail'))
        <div class="alert alert-danger alert-dismissible">
          <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
          <h5>{{session('fail')}}</h5>
        </div>
        @endif
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
               <b>All Manufacturing</b> 
                <div class="float-right"> <a href="/company/addmanufacturing/{{$data['productid']}}" class="btn btn-primary">Add </a> </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S/No.</th>
                      <th>Product Name</th>
                      <th>Manufacturing Code</th>
                      <th>SKU Unit</th>
                      <th>Base Price</th>
                      <th>Price For Stokist</th>
                      <th>Price For Distributor</th>
                      <th>Price For Retailer</th>
                      <th>Total in Manufacturing</th>
                      <th>Remaining</th>
                      <th>Creation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data['manufacturing'] as $item)
                      <tr>
                        <td> {{$i++}}</td>
                        <td>{{$item->Product->product_name}}</td>
                        <td>{{$item->manufacturing_code}}</td>
                        <td>{{$item->sku->category_name}}</td>
                        <td>{{$item->manufacturing_baseprice}}</td>
                        <td>{{$item->manufacturing_stokistprice}}</td>
                        <td>{{$item->manufacturing_distibutorprice}}</td>
                        <td>{{$item->manufacturing_retailerprice}}</td>
                        <td>{{$item->manufacturing_totalcount}}</td>
                        <td>{{$item->manufacturing_totalcount - $item->manufacturing_sold}}</td>
                        <td>{{$item->created_at}}</td>
                        
                        {{-- <td>
                          <a href="/company/editproduct/{{$item->manufacturing_id}}" class="btn btn-primary m-2"><i class="fas fa-file-invoice"></i></a>
                           </td> --}}
                        <td>
                            <a href="/company/editmanufacturing/{{$item->manufacturing_id}}" class="btn btn-primary m-2"><i class="fa fa-edit"></i></a>
                            <a href="/company/deletemanufacturing/{{$item->manufacturing_id}}" class="btn btn-danger m-2"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/No.</th>
                      <th>Product Name</th>
                      <th>Manufacturing Code</th>
                      <th>SKU Unit</th>
                      <th>Base Price</th>
                      <th>Price For Stokist</th>
                      <th>Price For Distributor</th>
                      <th>Price For Retailer</th>
                      <th>Total in Manufacturing</th>
                      <th>Remaining</th>
                      <th>Creation</th>
                      <th>Action</th>
                    </tr>
                    
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
         
        </div>
       
      </div>
    </div>
    
  </div>
 
@endsection