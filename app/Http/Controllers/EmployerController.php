<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Apply;
use App\Models\Detail;;
use App\Models\JobPost;

class EmployerController extends Controller
{
    public function index(){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            return view('employer.createjob');
        }
    }
    public function store(Request $request){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $job=new JobPost();
            $job->title=$request->title;
            $job->description=$request->description;
            $job->location=$request->location;
            $job->type=$request->type;
            $job->min_comp=$request->min_comp;
            $job->max_comp=$request->max_comp;
            $job->min_yoe=$request->min_yoe;
            $job->max_yoe=$request->max_yoe;
            $job->company=$request->company;
            $job->user_id=auth()->user()->id;
            $job->save();
            return redirect('/mycreatedjobs');
        }
    }
    public function update(Request $request){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $job=JobPost::find($request->id);
            $job->title=$request->title;
            $job->description=$request->description;
            $job->location=$request->location;
            $job->type=$request->type;
            $job->min_comp=$request->min_comp;
            $job->max_comp=$request->max_comp;
            $job->min_yoe=$request->min_yoe;
            $job->max_yoe=$request->max_yoe;
            $job->company=$request->company;
            $job->user_id=auth()->user()->id;
            $job->save();
            return redirect('/mycreatedjobs');
        }
    }
    public function myjobs(){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $jobs=JobPost::where('user_id',auth()->user()->id)->get();
            return view('employer.myjobs',compact('jobs'));
        }
    }
    public function editjobs($id,$title){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $job=JobPost::where('id',$id)->where('title',$title)->first();
            return view('employer.editjobs',compact('job'));
        }
    }
    public function delete(Request $request){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            // dd($request->id);
            JobPost::destroy($request->id);
            return redirect('/mycreatedjobs');
        }
    }
    public function seeapply($id){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $applicants=Apply::select('applies.created_at as applied_at','details.name','tenth','twelth','grad','post_grad','resume','experience','yoe','location','skills','details.id as id')->join('details','applies.detail_id','=','details.id')->where('applies.job_id','=',$id)->get();
            return view('employer.applicants',compact('applicants','id'));
        }
    }
    public function viewprofile($id){
        $emp=Role::where('role','Employer')->first();
        if(auth()->user()->role_id==$emp->id){
            $dets=Detail::with('user')->find($id);
            return view('employer.viewprofile',compact('dets'));
        }
    }
    public function myfilter(Request $request){
        if(auth()->user()->role_id==1){
            $posterid=auth()->user()->id;
            $jobs = JobPost::where('user_id',$posterid);
            if ($request->has('title') && $request->title !== null) {
                $jobs->where('title', 'like', '%' . $request->title . '%');
            }
            if ($request->has('location') && $request->location !== null) {
                $jobs->where('location', 'like', '%' . $request->location . '%');
            }
            if ($request->has('min_yoe') && $request->min_yoe !== null) {
                $jobs->where('max_yoe', '>=', $request->min_yoe);
            }
            if ($request->has('max_yoe') && $request->max_yoe !== null) {
                $jobs->where('min_yoe', '<=', $request->max_yoe);
            }
            if ($request->has('min_comp') && $request->min_comp !== null) {
                $jobs->where('max_comp', '>=', $request->min_comp);
            }
            if ($request->has('type') && $request->type !== null) {
                $jobs->where('type', $request->type);
            }
            $jobs = $jobs->orderBy('job_posts.id', 'desc')->get();
            // dd($jobs);
            // ->where('title', 'like', '%' . $request->title . '%')
            // $dets=Detail::where('user_id',auth()->user()->id)->first();
            return view('employer.myjobs',compact('jobs'));
        }
    }
    public function applicantfilter(Request $request){
        if(auth()->user()->role_id==1){
            $posterid=auth()->user()->id;
            $jobs = JobPost::where('user_id',$posterid);
            $applicants=Apply::select('applies.id','applies.created_at as applied_at','details.name','tenth','twelth','grad','post_grad','resume','experience','yoe','location','skills','details.id as id')->join('details','applies.detail_id','=','details.id')->where('applies.job_id','=',$request->id);

            if ($request->has('location') && $request->location !== null) {
                $applicants->where('location', 'like', '%' . $request->location . '%');
            }
            if ($request->has('min_yoe') && $request->min_yoe !== null) {
                $applicants->where('yoe', '>=', $request->min_yoe);
            }
            if ($request->has('max_yoe') && $request->max_yoe !== null) {
                $applicants->where('yoe', '<=', $request->max_yoe);
            }
            $applicants = $applicants->get();
            // dd($jobs);
            $id=$request->id;
            // ->where('title', 'like', '%' . $request->title . '%')
            // $dets=Detail::where('user_id',auth()->user()->id)->first();
            return view('employer.applicants',compact('applicants','id'));
        }
    }

}
