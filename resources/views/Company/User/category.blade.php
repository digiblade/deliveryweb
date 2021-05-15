@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">View {{$pagetype}}</li>
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
               <b>All Category</b> 
                <div class="float-right"> <a href="/company/addcategory" class="btn btn-primary">Add </a> </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/No.</th>
                    <th>Category</th>
                    <th>Category Image</th>
                    <th>Creation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data['category'] as $item)
                      <tr>
                        <td> {{$i++}}</td>
                        <td>{{$item->category_name}}</td>
                        <td><img src="{{url('/')}}/assets/categories/{{$item->category_image}}" height="150px" width="250px" alt=""></td>
                        <td> {{$item->created_at}}</td>
                        <td>
                            <a href="/company/editcategory/{{$item->id}}" class="btn btn-primary m-2"><i class="fa fa-edit"></i></a>
                            <a href="/company/deletecategory/{{$item->id}}" class="btn btn-danger m-2"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                    @endforeach
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/No.</th>
                      <th>Category</th>
                      <th>Category Image</th>
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