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
               <h5 class="mb-0">Article Management </h5>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending" style="width: 262px;">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="View Count: activate to sort column ascending" style="width: 397px;">Author Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="View Count: activate to sort column ascending" style="width: 397px;">View Count</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Comment Count: activate to sort column ascending" style="width: 193px;">Comment Count</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Share Count: activate to sort column ascending" style="width: 103px;">Share Count</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Word Count: activate to sort column ascending" style="width: 185px;">Word Count</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 156px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 156px;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($author_articles as $author_article)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$author_article->title}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$author_article->views_count}}</td>
                                    <td>{{$author_article->comment_count}}</td>
                                    <td>{{$author_article->share_count}}</td>
                                    <td>{{$author_article->word_count}}</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                                @endforeach
                              </tbody>                              
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-5">
                           <div class="dataTables_info" id="example4_info" role="status" aria-live="polite">Total Results {{$author_articles_total}}</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                           <div class="dataTables_paginate paging_simple_numbers" id="example4_paginate">
                              <ul class="pagination">
                              {{ $author_articles->links() }}
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