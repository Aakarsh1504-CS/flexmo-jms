{{-- {{$applied}} --}}
@extends('components.master')
@section('css')
 <!-- BEGIN: Page CSS-->
 {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-users.css"> --}}
 <style>
    .dataTables_filter{
        margin-left:400px;
    }
    .pagination{
        margin-left: 500px !important;
    }
 </style>
 <!-- END: Page CSS-->
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row ml-1 mb-1">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form action="/myappliedfilter" method="post">
                        @csrf
                        <div class="row border border-light rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-type">Job Title</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="title" id="users-list-verified">

                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-type">Min Compensaiton</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="min_comp" id="users-list-verified">

                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-type">Min Years Of Experience</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="min_yoe" id="users-list-verified">

                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-type">Max Years Of Experience</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="max_yoe" id="users-list-verified">

                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-type">Job Type</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="type" id="users-list-type">
                                        <option value="">Any</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Contractual">Contract</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Remote">Remote</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="users-list-location">Location</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="location" id="users-list-role">
                                </fieldset>
                            </div>
                            {{-- <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-status">Status</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-status">
                                        <option value="">Any</option>
                                        <option value="Active">Active</option>
                                        <option value="Close">Close</option>
                                        <option value="Banned">Banned</option>
                                    </select>
                                </fieldset>
                            </div> --}}
                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                <button class="btn btn-block btn-primary glow">Show</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- datatable start -->
                                <div class="table-responsive">
                                    <table id="users-list-datatable"   class="table">
                                        <thead>
                                            <tr>
                                                <th>Posted By</th>
                                                <th>Job Title</th>
                                                <th>Job Description</th>
                                                <th>Job Location</th>
                                                <th>Job Type</th>
                                                <th>Compensation</th>
                                                <th>Years Of Experience</th>
                                                <th>Applied At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($applied as $data)
                                            <tr>
                                                <td>{{$data->posted_by}} <a href="/allfrom/{{$data->company}}" class="info">{{$data->company}}</a></td>
                                                <td>{{$data->title}}</td>
                                                <td>{{$data->description}}</td>
                                                <td>{{$data->location}}</td>
                                                <td>{{$data->type}}</td>
                                                <td>{{$data->min_yoe}} years - {{$data->max_yoe}} years </td>
                                                <td>{{$data->min_comp}} LPA - {{$data->max_comp}} LPA </td>
                                                <td>{{$data->applied_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- datatable ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
<div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">Delete this Job?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Are You Sure</h2>
                <p>This action will delete the job <span style="color:red" id="delval"></span>.</p>
                <p>Location: <span style="color:red" id="delloc"></span>.</p>
                <p>Type: <span style="color:red" id="deltype"></span>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <form action="/deljob" method="post">
                    @csrf
                    <input type="hidden" name="id" id="delid">
                    <button type="submit" class="btn btn-outline-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- <!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<!-- END: Page Vendor JS-->
 <!-- BEGIN: Page JS-->
 <script src="../../../app-assets/js/scripts/pages/page-users.js"></script> --}}


 <!-- END: Page JS-->
@endsection
