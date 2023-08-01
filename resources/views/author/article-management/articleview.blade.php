@extends('layouts.authormaster')
@section('title','View Article')
@section('content')
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
   <!-- ============================================================== -->
   <!-- pageheader -->
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
            <h2 class="pageheader-title">Blank Pageheader </h2>
            <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Articles</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- ============================================================== -->
   <!-- end pageheader -->
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <h2 class="text-center">{{$article->title}}</h2>
         <br>
         <p>{!!$article->content!!}</P>
      </div>
   </div>
</div>
</div>
@endsection