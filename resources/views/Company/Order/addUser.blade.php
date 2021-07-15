@extends('Company.includes.includes')
@section('content')
<script>
 async function changeParent (parentType)  { 
   var dim = ''
   var res = await fetch('{{url('/')}}/api/getalluser/'+parentType)
   var data = await res.json()
   console.log(data)
   if(data.length==0){
    dim = '<option value="0" selected>Company</option>'

   }
   for (var row in data){
     dim += '<option value="'+data[row].user_id+'" >'+data[row].user_name+'</option>'
   }
   document.getElementById('parent').innerHTML = dim 
  }
  changeParent(0)
</script>
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
              <li class="breadcrumb-item active">Add Users</li>
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
               <b>Add Users</b> 
                
              </div>
              @if(session('success'))
                <div class="badge badge-success">{{session('success')}}</div>
              @elseif(session('failure'))
                <div class="badge badge-danger">{{session('failure')}}</div>
              @endif
              <div class="card-body">
                  <form action="/company/user/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="Category_name">User Type</label>
                      <select type="text" name="usertype" onchange="changeParent(this.value)" class="form-control">
                        <option value="1" selected>Company</option>
                        <option value="2">Super Stokist</option>
                        <option value="3">Distributor</option>
                        <option value="4">Area Sales Manager</option>
                      </select>
                      @error('usertype')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Parent</label>
                      <select type="text" id="parent" name="parent"  class="form-control">
                        
                      </select>
                      @error('parent')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Firm Name</label>
                      <input type="text" name="firmname" class="form-control">
                      @error('firmname')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Full Name</label>
                      <input type="text" name="fullname" class="form-control">
                      @error('fullname')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Mobile No.</label>
                      <input type="text" name="mobileno" class="form-control">
                      @error('mobileno')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">GST No.</label>
                      <input type="text" name="gst" class="form-control">
                      @error('gst')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Email</label>
                      <input type="text" name="user_email" class="form-control">
                      @error('user_email')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                   
                    <div class="form-group">
                      <label for="Category_name">Office Address</label>
                      <textarea type="text" name="officeadd" class="form-control"></textarea>
                      @error('officeadd')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Godown Address</label>
                      <textarea type="text" name="godownadd" class="form-control"></textarea>
                      @error('godownadd')
                          <div class="badge badge-danger">
                            {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="Category_name">Description</label>
                      <textarea type="text" name="description" class="form-control"></textarea>
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