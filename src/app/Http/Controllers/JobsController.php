<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobsController extends Controller
{
    //
    public function index()
    {
        $jobs = Jobs::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');

    }

    public function show(Jobs $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:5'],
        ]);

        //todo validation
        Jobs::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
    }

    public function edit(Jobs $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Jobs $job)
    {
        //validate request
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:5'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect('/jobs');
    }


}

