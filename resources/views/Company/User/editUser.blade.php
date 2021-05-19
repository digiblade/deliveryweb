@extends('Company.includes.includes')
@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Edit {{$pagename}}</li>
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
               <b>Edit {{$pagename}}</b> 
                <div class="float-right"><a href="/company/category" class="btn btn-primary">Back</a> </div>
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failer'))
                <div class="badge badge-danger">{{session('failer')}}</div>
              @endif
              <div class="card-body">
                <form action="/company/user/edit/" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$data['user']->user_id}}">
                  <div class="form-group">
                    <label for="Category_name">User Type</label>
                    <select type="text" name="usertype" class="form-control">
                      <option value="1" @if($data['user']->user_type==1) selected @endif>Company</option>
                      <option value="2" @if($data['user']->user_type==2) selected @endif>Super Stokist</option>
                      <option value="3" @if($data['user']->user_type==3) selected @endif>Distributor</option>
                      <option value="4" @if($data['user']->user_type==4) selected @endif>Retailor</option>
                      <option value="5" @if($data['user']->user_type==5) selected @endif>Area Sales Manager</option>
                    </select>
                    @error('usertype')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Firm Name</label>
                    <input type="text" name="firmname" value="{{$data['user']->user_firmname}}" class="form-control">
                    @error('firmname')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Full Name</label>
                    <input type="text" name="fullname" value="{{$data['user']->user_name}}" class="form-control">
                    @error('fullname')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Mobile No.</label>
                    <input type="text" name="mobileno" value="{{$data['user']->user_mobile}}" class="form-control">
                    @error('mobileno')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">GST No.</label>
                    <input type="text" name="gst" value="{{$data['user']->user_gstNo}}" class="form-control">
                    @error('gst')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Email</label>
                    <input type="text" name="user_email" value="{{$data['user']->user_email}}" class="form-control">
                    @error('user_email')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                 
                  <div class="form-group">
                    <label for="Category_name">Office Address</label>
                    <textarea type="text" name="officeadd"  class="form-control">{{$data['user']->user_officeaddress}}</textarea>
                    @error('officeadd')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Godown Address</label>
                    <textarea type="text" name="godownadd"  class="form-control">{{$data['user']->user_godownaddress}}</textarea>
                    @error('godownadd')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Category_name">Description</label>
                    <textarea type="text" name="description"  class="form-control">{{$data['user']->user_description}}</textarea>
                    @error('description')
                        <div class="badge badge-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="Category_name">User Profile Photo</label>
                    <input type="file" name="uImage" class="form-control">
                    @error('uImage')
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