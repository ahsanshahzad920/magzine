@extends('layouts.adminmaster')
@section('content')                         
<div class="dashboard-wrapper">
   <div class="row">
      <!-- ============================================================== -->
      <!-- fixed header  -->
      <!-- ============================================================== -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card">
            <div class="card-header">
               <h5 class="mb-0">Author Management </h5>
               <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                           <div class="dataTables_length" id="example4_length">
                              <label>
                                 Show 
                                 <select name="example4_length" aria-controls="example4" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                 </select>
                                 entries
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div id="example4_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example4"></label></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <table id="example4" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example4_info">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending" style="width: 262px;">Author Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="View Count: activate to sort column ascending" style="width: 397px;">Author Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Comment Count: activate to sort column ascending" style="width: 193px;">Author Articles</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 156px;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($authors as $author)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$author->name}}</td>
                                    <td>{{$author->email}}</td>
                                    <td><a href="{{route('admin.author.articles',$author->id)}}"><button>View Articles</button></a></td>
                                    <td><button>Action</button></td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-5">
                           <div class="dataTables_info" id="example4_info" role="status" aria-live="polite">Total Results {{$authors_count}}</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                           <div class="dataTables_paginate paging_simple_numbers" id="example4_paginate">
                              <ul class="pagination">
                              {{ $authors->links() }}
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- end fixed header  -->
      <!-- ============================================================== -->
   </div>
</div>    
@endsection