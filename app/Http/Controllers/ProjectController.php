<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|max:5',
            'description' => 'required',
            // 'url' => '...',
            // ‘status' => '...',
        ]);

        Project::create($validated);

        return redirect( route('projects.index'))->with('success', 'Projet créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|min:5',
            'description' => 'required',
            // 'url' => '...',
            // ‘status' => '...',
        ]);
        $project->update($validated);

        return redirect( route('projects.show', $project) )
            ->with('success', 'Projet modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);

        return redirect('/projects')
            ->with('success', 'Projet supprimé !');
    }
}
