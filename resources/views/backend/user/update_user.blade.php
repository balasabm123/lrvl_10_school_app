


@extends('backend.layout.app')
@section('content') 
   
<section class="section">
      <div class="row">
    

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update User</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{url('update_user/'.$getRecord->id)}}">
              {{ csrf_field()}}
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" name="name" value="{{$getRecord->name}}" class="form-control" id="inputNanme4" required>
                  <div style="color: red;">{{ $errors->first('name')}}</div>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control"  value="{{$getRecord->email}}" id="inputEmail4" name="email" required>
                  <div style="color: red;">{{ $errors->first('email')}}</div>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="text" class="form-control" id="inputPassword4" name="password"  >
                  <p>Do you want to change password type in password field</p>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Status</label>
                   <select class="form-control" name="status">
                            <option {{ ($getRecord->status==1) ? 'selected' : '' }} value="1">Active</option>
                            <option {{ ($getRecord->status==0) ? 'selected' : '' }} value="0">Inactive</option>
                   </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

      

        </div>
      </div>
    </section>
 
@endsection  