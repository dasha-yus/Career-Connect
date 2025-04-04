<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['search']))->paginate(6)
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'logo' => 'required',
            'location' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);

        $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        Job::create($formFields);

        return redirect('/')->with('message', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $job->update($formFields);

        return redirect("/jobs/$job->id")->with('message', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        if ($job->logo && Storage::disk('public')->exists($job->logo)) {
            Storage::disk('public')->delete($job->logo);
        }
        $job->delete();
        return redirect('/')->with('message', 'Job deleted successfully');
    }
}
