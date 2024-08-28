<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\JobPost;
use App\Models\Apply;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    public function index(){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $detailid=$detail->id;
            $jobs = JobPost::leftJoin('applies', function ($join) use ($detailid) {
                $join->on('job_posts.id', '=', 'applies.job_id')
                     ->where('applies.detail_id', '=', $detailid);
            })
            ->with('poster')
            ->select('job_posts.*', 'applies.id as applied')
            ->orderBy('job_posts.id','desc')
            ->get();
            // dd($jobs);
            $dets=Detail::where('user_id',auth()->user()->id)->first();
            return view('jobseeker.searchjobs',compact('jobs','dets'));
        }
    }

    public function filter(Request $request){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $detailid=$detail->id;

            $jobs = JobPost::leftJoin('applies', function ($join) use ($detailid) {
                $join->on('job_posts.id', '=', 'applies.job_id')
                    ->where('applies.detail_id', '=', $detailid);
            })
            ->with('poster')
            ->select('job_posts.*', 'applies.id as applied');
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
            $dets=Detail::where('user_id',auth()->user()->id)->first();
            return view('jobseeker.searchjobs',compact('jobs','dets'));
        }
    }
    public function storedets(Request $request){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            return view('jobseeker.editdetails',compact('detail'));
        }
    }
    public function storeinfo(Request $request){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $request->validate([
                'resume'=>'required|mimes:pdf,docx|max:1024',
            ]);
            $file=$request->resume;
            $detail->resume=$file->store('resume','public');
            if($request->tenth){
                $detail->tenth=$request->tenth;
            }
            if($request->twelth){
                $detail->twelth=$request->twelth;
            }
            if($request->grad){
                $detail->grad=$request->grad;
            }
            // dd($request->post_grad);
            if($request->post_grad){
                $detail->post_grad=$request->post_grad;
            }
            if($request->yoe){
                $detail->yoe=$request->yoe;
            }
            if($request->skills){
                $detail->skills=$request->skills;
            }
            if($request->experience){
                $detail->experience=$request->experience;
            }
            if($request->location){
                $detail->location=$request->location;
            }
            $detail->save();
            return redirect('/alljobs');
        }
    }
    public function updateinfo(Request $request){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            if($request->hasFile('new_resume')){
                $request->validate([
                    'resume'=>'mimes:pdf,docx|max:1024',
                ]);
                $file=$request->new_resume;
                $detail->resume=$file->store('resume','public');
            }
            if($request->tenth){
                $detail->tenth=$request->tenth;
            }
            if($request->twelth){
                $detail->twelth=$request->twelth;
            }
            if($request->grad){
                $detail->grad=$request->grad;
            }
            if($request->post_grad){
                $detail->post_grad=$request->post_grad;
            }
            if($request->yoe){
                $detail->yoe=$request->yoe;
            }
            if($request->skills){
                $detail->skills=$request->skills;
            }
            if($request->experience){
                $detail->experience=$request->experience;
            }
            if($request->location){
                $detail->location=$request->location;
            }
            $detail->save();
            return redirect('/alljobs');
        }
    }
    public function myprofile(){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            return view('jobseeker.myprofile',compact('detail'));
        }
    }
    public function applied(){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $applied=Apply::select('title','description','location','type','min_comp','max_comp','min_yoe','max_yoe','company','applies.created_at as applied_at','users.name as posted_by')->join('job_posts','job_posts.id','=','applies.job_id')->join('users','users.id','=','job_posts.user_id')->where('detail_id',$detail->id)->get();
            return view('jobseeker.appliedjobs',compact('applied'));
        }
    }
    public function myappliedfilter(Request $request){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $applied=Apply::select('title','description','location','type','min_comp','max_comp','min_yoe','max_yoe','company','applies.created_at as applied_at','users.name as posted_by')->join('job_posts','job_posts.id','=','applies.job_id')->join('users','users.id','=','job_posts.user_id')->where('detail_id',$detail->id);
            if ($request->has('title') && $request->title !== null) {
                $applied->where('title', 'like', '%' . $request->title . '%');
            }
            if ($request->has('location') && $request->location !== null) {
                $applied->where('location', 'like', '%' . $request->location . '%');
            }
            if ($request->has('min_yoe') && $request->min_yoe !== null) {
                $applied->where('max_yoe', '>=', $request->min_yoe);
            }
            if ($request->has('max_yoe') && $request->max_yoe !== null) {
                $applied->where('min_yoe', '<=', $request->max_yoe);
            }
            if ($request->has('min_comp') && $request->min_comp !== null) {
                $applied->where('max_comp', '>=', $request->min_comp);
            }
            if ($request->has('type') && $request->type !== null) {
                $applied->where('type', $request->type);
            }
            $applied=$applied->get();
            return view('jobseeker.appliedjobs',compact('applied'));
        }
    }
    public function apply($id,$title){
        if(auth()->user()->role_id==2){
            $detail=Detail::where('user_id',auth()->user()->id)->first();
            $app=new Apply();
            $app->job_id=$id;
            $app->detail_id=$detail->id;
            $app->save();
            return redirect('/alljobs');
        }
    }
    public function allfrom($company){
        if(auth()->user()->role_id==2){
            $dets=Detail::where('user_id',auth()->user()->id)->first();
            $detailid=$dets->id;
            $jobs = JobPost::leftJoin('applies', function ($join) use ($detailid,$company) {
                $join->on('job_posts.id', '=', 'applies.job_id')
                     ->where('applies.detail_id', '=', $detailid);
            })
            ->with('poster')
            ->where('job_posts.company','=',$company)
            ->select('job_posts.*', 'applies.id as applied')
            ->orderBy('job_posts.id','desc')
            ->get();
            // dd($jobs);
            return view('jobseeker.allfromjobs',compact('jobs','dets'));
        }
    }

}
