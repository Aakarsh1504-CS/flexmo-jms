@extends('components.master')
@section('css')
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
<!-- END: Page CSS-->
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Job Info</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">

                                        <form class="form form-horizontal" action="/storejob" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Job Info</h4>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Job Title</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="projectinput1" class="form-control"
                                                            placeholder="Job Title" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Job Description</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="projectinput2" class="form-control" style="resize:none"
                                                            placeholder="Job Description" name="description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput3">Job Location</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="projectinput3" class="form-control"
                                                            placeholder="Job Location" name="location">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Company</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="projectinput1" class="form-control"
                                                            placeholder="Company" name="company">
                                                    </div>
                                                </div>
                                                <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="projectinput5">Job Type</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="type" class="form-control" id="pi6">
                                                            <option value="">---Select A Job Type---</option>
                                                            <option value="Full Time">Full Time</option>
                                                            <option value="Part Time">Part Time</option>
                                                            <option value="Contract">Contract</option>
                                                            <option value="Internship">Internship</option>
                                                            <option value="Remote">Remote</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="projectinput5">Years Of Experience - Minimum</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="decimal" id="projectinput5" class="form-control"
                                                            placeholder="Minimum Years Of Experience" name="min_yoe">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="projectinput5">Years Of Experience - Maximum</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="decimal" id="projectinput5" class="form-control"
                                                            placeholder="Maximum Years Of Experience" name="max_yoe">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput7">Minimum Compensation - In Lakhs Per Year</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="decimal" class="form-control" placeholder="Minimum Compensation In Lakhs Per Year" name="min_comp" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput7">Maximum Compensation - In Lakhs Per Year</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="decimal" placeholder="Maximum Compensation In Lakhs Per Year" class="form-control" name="max_comp" id="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
