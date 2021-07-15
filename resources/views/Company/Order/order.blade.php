@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active">View {{$pagename}}</li>
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
        @elseif(session('failure'))
        <div class="alert alert-danger alert-dismissible">
          <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
          <h5>{{session('failure')}}</h5>
        </div>
        @endif
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
               <b>All {{$pagename}}</b> 
                {{-- <div class="float-right"> <a href="/company/addcategory" class="btn btn-primary">Add </a> </div>  --}}
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/No.</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Address</th>
                    <th>User price</th>
                    <th>Product</th>
                    <th>HSN Code</th>
                    <th>SKU</th>
                    <th>Creation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data['order'] as $item)
                      <tr>
                        <td> {{$i++}}</td>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->user_email}}</td>
                        <td>{{$item->user_mobile}}</td>
                        <td>{{$item->user_firmname}}</td>
                        <td>{{$item->user_gstNo}}</td>
                        <td>{{$item->user_officeaddress}}</td>
                        <td>{{$item->user_godownaddress}}</td>
                        <td>{{$item->user_description}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="{{url('/')}}/company/edituser/{{$type}}/{{$item->user_id}}" class="btn btn-primary m-2"><i class="fa fa-edit"></i></a>
                            <a href="{{url('/')}}/company/user/delete/{{$item->user_id}}" class="btn btn-danger m-2"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/No.</th>
                      <th>User Id</th>
                      <th>User Name</th>
                      <th>User Address</th>
                      <th>User price</th>
                      <th>Product</th>
                      <th>HSN Code</th>
                      <th>SKU</th>
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