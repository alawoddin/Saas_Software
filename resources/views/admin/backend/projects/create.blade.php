@extends('admin.admin_master')
@section('admin')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card shadow-sm">
                
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0">Create New Project</h1>
                    <p class="mb-0 text-white-50">Start building your AI-Generated Website</p> 
                </div>

    <form action="" class="card-body" method="POST" id="project-form">
        @csrf

     <div class="mb-3">
        <label for="name" class="form-label fw-semibold text-white">Project Name <span class="text-danger">*</span> </label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="e.g, My Awesome Website" required>
        <small class="text-muted">Give your project a descriptive name</small>
     </div>

      <div class="mb-3">
        <label for="description" class="form-label fw-semibold text-white">Description <span class="text-muted">(Optional)</span> </label>
         <textarea name="description" id="description" rows="3" class="form-control" placeholder="Describe your project.. what kind of website do you want to build?">          
         </textarea>
        <small class="text-muted">This will help the AI understand your project better</small>
     </div>

    </form>
    

            </div> 
        </div> 
    </div> 
</div> 



@endsection