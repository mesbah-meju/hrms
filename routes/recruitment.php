<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recruitment\JobPostController;
use App\Http\Controllers\Recruitment\JobCandidateController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('jobPost')->group(function () {
        Route::get('/', [JobPostController::class, 'index'])->name('jobPost.index');
        Route::get('/create', [JobPostController::class, 'create'])->name('jobPost.create');
        Route::post('/store', [JobPostController::class, 'store'])->name('jobPost.store');
        Route::get('/{jobPostID}', [JobPostController::class, 'show'])->name('jobPost.show');
        Route::get('/{jobPostID}/edit', [JobPostController::class, 'edit'])->name('jobPost.edit');
        Route::put('/{jobPostID}', [JobPostController::class, 'update'])->name('jobPost.update');
        Route::delete('/{jobPostID}/delete', [JobPostController::class, 'destroy'])->name('jobPost.delete');
    });

    Route::prefix('jobCandidate')->group(function () {
        Route::get('/', [JobCandidateController::class, 'index'])->name('jobCandidate.index');
        Route::get('applyCandidateList/{id}', [JobCandidateController::class, 'applyCandidateList'])->name('jobCandidate.applyCandidateList');
        Route::get('shortListedApplicant/{id}', [JobCandidateController::class, 'shortListedApplicant'])->name('jobCandidate.shortListedApplicant');
        Route::get('shortlist/{id}', [JobCandidateController::class, 'shortlist'])->name('applicant.shortlist');
        Route::get('reject/{id}', [JobCandidateController::class, 'reject'])->name('applicant.reject');
        Route::get('jobInterview/{id}', [JobCandidateController::class, 'jobInterview'])->name('applicant.jobInterview');
        Route::post('jobInterviewStore/{id}', [JobCandidateController::class, 'jobInterviewStore'])->name('applicant.jobInterviewStore');
        Route::get('rejectedApplicant/{id}', [JobCandidateController::class, 'rejectedApplicant'])->name('jobCandidate.rejectedApplicant');
        Route::get('jobInterviewList/{id}', [JobCandidateController::class, 'jobInterviewList'])->name('jobCandidate.jobInterviewList');
    });
});