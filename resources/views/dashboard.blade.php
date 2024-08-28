@extends('components.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @if(auth()->user()->role_id==1)
            <h1>Find the right applicant</h1>
            @elseif (auth()->user()->role_id==2)
            <h1>Find the right job</h1>
            @endif
        </div>
    </div>
</div>
@endsection
