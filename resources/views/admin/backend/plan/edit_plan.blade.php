@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header border-bottom border-dashed d-flex align-items-center">
            <h4 class="header-title">Edit Plans </h4>
        </div>

        <div class="card-body">
            
    <form action="{{ route('update.plan') }}" method="post" enctype="multipart/form-data" >
        @csrf

        <input type="hidden" name="id" value="{{ $plans->id }}" >

        <div class="row g-2">
            
            <div class="mb-3 col-md-6">
                <label for="inputEmail4" class="form-label">Plan Name</label>
                <input type="text" name="name" class="form-control" value="{{ $plans->name }}" >
            </div>

           <div class="mb-3 col-md-6">
                <label for="inputEmail4" class="form-label">Token Limit</label>
                <input type="text" name="token_limit" class="form-control" value="{{ $plans->token_limit }}" >
            </div>

            <div class="mb-3 col-md-6">
                <label for="inputEmail4" class="form-label">Template Limit</label>
                <input type="text" name="template_limit" class="form-control" value="{{ $plans->template_limit }}" >
            </div> 

             <div class="mb-3 col-md-6">
                <label for="inputEmail4" class="form-label">Price </label>
                <input type="text" name="price" class="form-control" value="{{ $plans->price }}"  >
            </div>
            
        </div> 
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
</div>

 


@endsection