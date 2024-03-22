<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectRequest;


use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('updated_at')->orderByDesc('created_at')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        //Controllo se mi arriva un file
        if (Arr::exists($data, 'image')) {
            //Lo salvo e prendo l'url
            $img_url = Storage::putFile('project_images', $data['image']);
            $project->image = $img_url;
        }
        $project->save();
        return to_route('admin.projects.show', $project->id)
            //Flash data
            ->with('message', 'Progetto creato con successo')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        //Controllo se mi arriva un file
        if (Arr::exists($data, 'image')) {
            //Controllo se c'era gia un immagine e la cancello
            if ($project->image) Storage::delete($project->image);

            //Lo salvo e prendo l'url
            $img_url = Storage::putFile('project_images', $data['image']);
            $project->image = $img_url;
        }

        $project->update($data);
        return to_route('admin.projects.index', compact('project'))
            //Flash data
            ->with('type', 'success')
            ->with('message', "Progetto {$project->title} modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) Storage::delete($project->image);
        $project->delete();
        return to_route('admin.projects.index')
            //Flash data
            ->with('type', 'success')
            ->with('message', 'Post eliminato con successo');
    }
}
