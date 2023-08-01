@extends('layouts.authormaster')
@section('title','Add Article')
@section('content')
<br>
<div class="dashboard-wrapper">
<div class="row">
   <!-- ============================================================== -->
   <!-- validation form -->
   <!-- ============================================================== -->
  
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
         <h5 class="card-header">Add New Article</h5>
         <div class="card-body">
            <form class="needs-validation" method="post" onsubmit="return false" enctype="multipart/form-data">
      
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                     <label for="validationCustom01">Title</label>
                     <input type="text" class="form-control" id="title" placeholder="Enter Title" required="">
                     <div class="valid-feedback">
                        Looks good!
                     </div>
                  </div>
                  <br>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                     <label for="validationCustom02">Content</label>
                     <textarea class="summernote" id="content"></textarea>
                     <div class="valid-feedback">
                        Looks good!
                     </div>
                  </div>
           
               <br>
               <div class="form-row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                     <button class="btn btn-primary" type="submit" id="save">Submit form</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- ============================================================== -->
   <!-- end validation form -->
   <!-- ============================================================== -->
</div>
</div>
@include('author.article-management.js.create')
@endsection