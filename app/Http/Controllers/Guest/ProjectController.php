<?php

namespace App\Http\Controllers\Guest;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}
