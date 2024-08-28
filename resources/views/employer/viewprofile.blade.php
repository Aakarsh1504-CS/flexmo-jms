@extends('components.master')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-sm-12">
                        <!-- Kick start -->
                        <div id="kick-start" class="card">
                            <div class="card-header">
                                <h2 style="font-weight: 600">Information</h2>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="user-div"
                                            style="display:flex;align-items:center;gap:15px;margin-bottom:20px;">
                                            <img style="width:150px;height:150px;border-radius:50%;border:2px solid #ccc;"
                                                src="{{ asset('app-assets/images/avatar.jpg') }}" alt="User Avatar">
                                            <div id="dets">
                                                <h1 style="font-weight:700;">{{ $dets->user->name }}</h1>
                                                <h3 class="info" style="color:#666;">{{ $dets->user->email }}</h3>
                                            </div>
                                        </div>

                                        <section>
                                            <h1 style="font-weight: 600; margin-top: 20px;">Education</h1>
                                            <hr>
                                            <div style="display: flex">
                                                <div id="ten" style="width:50%">
                                                    @if ($dets->tenth)
                                                        <h2 style="font-weight:bold;color:black">10th Details</h2>
                                                        @if ($dets->tenth['school_name'])
                                                            <h4 style="font-weight:bold;margin-left:12px">10th School Name:
                                                                <span
                                                                    style="font-style:italic;">{{ $dets->tenth['school_name'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->tenth['marks'])
                                                            <h4 style="font-weight:bold;margin-left:12px">10th Marks: <span
                                                                    style="font-style:italic;">{{ $dets->tenth['marks'] }}</span>
                                                            </h4>
                                                        @endif
                                                    @endif
                                                </div>

                                                <div id="twel">
                                                    @if ($dets->twelth)
                                                        <h2 style="font-weight:bold;color:black">12th Details</h2>

                                                        @if ($dets->twelth['school_name'])
                                                            <h4 style="font-weight:bold;margin-left:12px">12th School Name:
                                                                <span
                                                                    style="font-style:italic;">{{ $dets->twelth['school_name'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->twelth['marks'])
                                                            <h4 style="font-weight:bold;margin-left:12px">12th Marks: <span
                                                                    style="font-style:italic;">{{ $dets->twelth['marks'] }}</span>
                                                            </h4>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div style="display:flex;margin-top:20px">
                                                <div id="gradd" style="width:50%">
                                                    @if ($dets->grad)
                                                        <h2 style="font-weight:bold;color:black">Graduation Details</h2>

                                                        @if ($dets->grad['degree'])
                                                            <h4 style="font-weight:bold;margin-left:12px">Graduation Degree:
                                                                <span
                                                                    style="font-style:italic;">{{ $dets->grad['degree'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->grad['university'])
                                                            <h4 style="font-weight:bold;margin-left:12px">Graduation University:
                                                                <span
                                                                    style="font-style:italic;">{{ $dets->grad['university'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->grad['year'])
                                                            <h4 style="font-weight:bold;margin-left:12px">Graduation Year: <span
                                                                    style="font-style:italic;">{{ $dets->grad['year'] }}</span>
                                                            </h4>
                                                        @endif
                                                    @endif

                                                </div>
                                                <div id="pgradd">
                                                    @if ($dets->post_grad)
                                                        @if ($dets->post_grad['degree'])
                                                        <h2 style="font-weight:bold;color:black">Post Graduation Details</h2>
                                                            <h4 style="font-weight:bold;margin-left:12px">Post Graduation
                                                                Degree: <span
                                                                    style="font-style:italic;">{{ $dets->post_grad['degree'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->post_grad['university'])
                                                            <h4 style="font-weight:bold;margin-left:12px">Post Graduation
                                                                University: <span
                                                                    style="font-style:italic;">{{ $dets->post_grad['university'] }}</span>
                                                            </h4>
                                                        @endif
                                                        @if ($dets->post_grad['year'])
                                                            <h4 style="font-weight:bold;margin-left:12px">Post Graduation Year:
                                                                <span
                                                                    style="font-style:italic;">{{ $dets->post_grad['year'] }}</span>
                                                            </h4>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                        </section>

                                        <section>
                                            <h1 style="font-weight: 600; margin-top: 20px;">Professional Details</h1>
                                            <hr>
                                            @if ($dets->experience)
                                                <h4 style="font-weight:bold;">Experience: <span
                                                        style="font-style:italic;color:black">{{ $dets->experience }}</span></h4>
                                            @endif

                                            @if ($dets->yoe)
                                                <h4 style="font-weight:bold;">Years of Experience: <span
                                                        style="font-style:italic;color:black">{{ $dets->yoe }} years</span></h4>
                                            @endif

                                            @if ($dets->location)
                                                <h4 style="font-weight:bold;">Location: <span
                                                        style="font-style:italic;color:black">{{ $dets->location }}</span></h4>
                                            @endif

                                            @if ($dets->skills)
                                                <h4 style="font-weight:bold;">Skills: <span
                                                        style="font-style:italic;color:black">{{ $dets->skills }}</span></h4>
                                            @endif
                                        </section>

                                        @if ($dets->resume)
                                            <section>
                                                <hr>
                                                <h4 style="font-weight:bold;">Resume:
                                                    <a href="{{ asset('storage/' . $dets->resume) }}"
                                                        download="Resume_{{ $dets->user->name }}"
                                                        style="color:#007bff;text-decoration:underline;">Download</a>
                                                </h4>
                                            </section>
                                        @endif
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
