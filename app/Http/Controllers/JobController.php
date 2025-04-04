<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $types = Type::all();
        return view('jobs.create', ['types' => $types]);
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

        $formFields['user_id'] = Auth::id();
        $formFields['type_id'] = (int) $request['type'];

        Job::create($formFields);

        return redirect('/')->with('message', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        $types = Type::all();
        return view('jobs.edit', ['job' => $job, 'types' => $types]);
    }

    public function update(Request $request, Job $job)
    {
        if ($job->user_id != Auth::id()) {
            abort(403, 'Unauthorized Action');
        }

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

        $formFields['type_id'] = (int) $request['type'];

        $job->update($formFields);

        return redirect("/jobs/$job->id")->with('message', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        if ($job->user_id != Auth::id()) {
            abort(403, 'Unauthorized Action');
        }

        if ($job->logo && Storage::disk('public')->exists($job->logo)) {
            Storage::disk('public')->delete($job->logo);
        }
        $job->delete();
        return redirect('/jobs/manage')->with('message', 'Job deleted successfully');
    }

    public function manage()
    {
        return view('jobs.manage', ['jobs' => Auth::user()->jobs()->get()]);
    }
}
