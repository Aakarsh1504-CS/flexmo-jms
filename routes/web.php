<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobSeekerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/applicantprofile/{id}',[EmployerController::class,'viewprofile']);
    Route::get('/createjob',[EmployerController::class,'index']);
    Route::post('/filtersearch',[JobSeekerController::class,'filter']);
    Route::post('/myappliedfilter',[JobSeekerController::class,'myappliedfilter']);
    Route::post('/filtermysearch',[EmployerController::class,'myfilter']);
    Route::post('/filterapplicants',[EmployerController::class,'applicantfilter']);
    Route::get('/allfrom/{company}',[JobSeekerController::class,'allfrom']);
    Route::get('/alljobs',[JobSeekerController::class,'index']);
    Route::get('/myappliedjobs',[JobSeekerController::class,'applied']);
    Route::get('/apply/{id}/jobpost/{title}',[JobSeekerController::class,'apply']);
    Route::post('/storeinfo',[JobSeekerController::class,'storeinfo']);
    Route::post('/updateinfo',[JobSeekerController::class,'updateinfo']);
    Route::get('/editprofile',[JobSeekerController::class,'storedets']);
    Route::get('/myprofile',[JobSeekerController::class,'myprofile']);
    Route::post('/storejob',[EmployerController::class,'store']);
    Route::get('/view/{id}/applicants',[EmployerController::class,'seeapply']);
    Route::post('/updatejob',[EmployerController::class,'update']);
    Route::post('/deljob',[EmployerController::class,'delete']);
    Route::get('/mycreatedjobs',[EmployerController::class,'myjobs']);
    Route::get('/edit/{id}/jobpost/{title}',[EmployerController::class,'editjobs']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
