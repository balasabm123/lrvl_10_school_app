


@extends('backend.layout.app')
@section('content') 
   

<div class="pagetitle">
    
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">  
        </div> 
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            @include('layouts.messages')
              <h5 class="card-title">Users List

              <a href="{{ url('add_user') }}" class="btn btn-primary" style="float: inline-end;">Add New</a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th> 
                    <th scope="col">Status</th>
                    <th scope="col">Created  date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($getRecords as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{!empty($value->status) ? 'Active' : 'Inactive'}}</td>
                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td>
                        <a href="{{ url('edit_user/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a  onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('delete_user/'.$value->id)  }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="100%">No Records found...</td>
                </tr>
                @endforelse
                  
                </tbody>
              </table>

               
               {{ $getRecords->appends(Request::except('page'))->links() }}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        

        </div>
      </div>
    </section>
  

  <!-- End #main -->
@endsection 

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->
