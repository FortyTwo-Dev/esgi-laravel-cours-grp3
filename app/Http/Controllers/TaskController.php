<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Project $project)
    {
        $project->tasks()->create($request->validated());
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Project $project, Task $task)
    {
        if ($task->project_id !== $project->id) {
            abort(403, 'Cette tâche n\'appartient pas à ce projet.');
        }

        $task->update($request->validated());

        return redirect()->back();
    }
}
