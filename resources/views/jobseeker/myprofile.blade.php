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
            <div class="content-header row"></div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Edit Your Details</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="/updateinfo" enctype="multipart/form-data" method="POST">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Your Educational Background</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="tenth_marks">10th Marks</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="tenth_marks" class="form-control"
                                                            placeholder="10th Marks" name="tenth[marks]" value="{{ $detail->tenth['marks'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="tenth_school">10th School Name</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="tenth_school" class="form-control"
                                                            placeholder="10th School Name" name="tenth[school_name]" value="{{ $detail->tenth['school_name'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="twelth_marks">12th Marks</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="twelth_marks" class="form-control"
                                                            placeholder="12th Marks" name="twelth[marks]" value="{{ $detail->twelth['marks'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="twelth_school">12th School Name</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="twelth_school" class="form-control"
                                                            placeholder="12th School Name" name="twelth[school_name]" value="{{ $detail->twelth['school_name'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="grad_degree">Graduation Degree</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="grad_degree" class="form-control"
                                                            placeholder="Graduation Degree" name="grad[degree]" value="{{ $detail->grad['degree'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="grad_university">Graduation University</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="grad_university" class="form-control"
                                                            placeholder="Graduation University" name="grad[university]" value="{{ $detail->grad['university'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="grad_year">Graduation Year</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="grad_year" class="form-control"
                                                            placeholder="Graduation Year" name="grad[year]" value="{{ $detail->grad['year'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="post_grad_degree">Post-Graduation Degree</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="post_grad_degree" class="form-control"
                                                            placeholder="Post-Graduation Degree" name="post_grad[degree]" value="{{ $detail->post_grad['degree'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="post_grad_university">Post-Graduation University</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="post_grad_university" class="form-control"
                                                            placeholder="Post-Graduation University" name="post_grad[university]" value="{{ $detail->post_grad['university'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="post_grad_year">Post-Graduation Year</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="post_grad_year" class="form-control"
                                                            placeholder="Post-Graduation Year" name="post_grad[year]" value="{{ $detail->post_grad['year'] ?? '' }}">
                                                    </div>
                                                </div>

                                                <h4 class="form-section"><i class="ft-clipboard"></i> Job Specific Information</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="resume">Resume</label>
                                                    <div class="col-md-9 mx-auto">
                                                        @if(!empty($detail->resume))
                                                            <p>
                                                                <a href="{{ asset('storage/' . $detail->resume) }}" target="_blank">View Current Resume</a>
                                                            </p>
                                                        @endif
                                                        {{-- <input type="text" id="resume" class="form-control" name="resume" value="{{ $detail->resume }}"> --}}
                                                        <input type="file" id="resume" class="form-control" name="new_resume">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="experience">Experience</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="experience" class="form-control"
                                                            placeholder="Experience" name="experience" value="{{ $detail->experience ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="yoe">Years of Experience</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" id="yoe" class="form-control"
                                                            placeholder="Years of Experience" name="yoe" value="{{ $detail->yoe ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="location">Location</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="location" class="form-control"
                                                            placeholder="Location" name="location" value="{{ $detail->location ?? '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="skills">Skills</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="skills" class="form-control"
                                                            placeholder="Skills" name="skills" value="{{ $detail->skills ?? '' }}">
                                                            <p>Write , sepearted skills</p>
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
