<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::all();
        return view('pages.index', compact('jobs'));
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'company' => 'required|string|max:200',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Job::create([
            'company' => $validateData['company'],
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'requirements' => $validateData['requirements'],
            'salary' => $validateData['salary'],
            'image' => $imagePath,
            'status' => $validateData['status'] ?? 0,
        ]);

        return redirect()->route('jobs.index')->with('message', 'Job Created Successfully');
    }

    public function edit($id) {
        $job = Job::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('error', 'Job not found.');
        }
        return view('pages.edit', compact('job'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'company' => 'required|string|max:200',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $job = Job::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('error', 'Job not found.');
        }

        if ($request->hasFile('image')) {
            if ($job->image && \Storage::exists('public/' . $job->image)) {
                \Storage::delete('public/' . $job->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $job->image;
        }

        $job->update([
            'company' => $request->company,
            'name' => $request->name,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'image' => $imagePath,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('jobs.index')->with('message', 'Job updated successfully.');
    }

    public function destroy($id) {
        $job = Job::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('error', 'Job not found.');
        }

        if ($job->image && \Storage::exists('public/' . $job->image)) {
            \Storage::delete('public/' . $job->image);
        }

        $job->delete();
        return redirect()->route('jobs.index')->with('message', 'Job deleted successfully.');
    }
}
