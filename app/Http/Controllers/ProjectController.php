<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectController extends Controller
{
    // ...
    public function index(): Renderable
    {
        $projects = Project::paginate(1);
        return view('projects.index', compact('projects'));
    }

    public function create(): Renderable
    {
        $project = new Project;
        $title = __('Crear proyecto');
        $action = route('projects.store');
        $buttonText = __('Crear proyecto');
        return view('projects.form', compact('project', 'title', 'action', 'buttonText'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:projects,NombreProyecto|string|max:100',
            'fuenteFondos' => 'required|string|max:1000',
            'MontoPlanificado' => 'required|numeric',
            'MontoPatrocinado' => 'required|numeric',
            'MontoFondosPropios' => 'required|numeric'
        ]);
        Project::create([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->input('MontoPlanificado'),
            'MontoPatrocinado' => $request->input('MontoPatrocinado'),
            'MontoFondosPropios' => $request->input('MontoFondosPropios')
        ]);
        return redirect()->route('projects.index');
    }

    public function show(Project $project): Renderable
    {
        $project->load('user:id,name');
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): Renderable
    {
        $title = __('Editar proyecto');
        $action = route('projects.update', $project);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('projects.form', compact('project', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:projects,NombreProyecto,' . $project->id . '|string|max:100',
            'fuenteFondos' => 'required|string|max:1000',
            'MontoPlanificado' => 'required|numeric',
            'MontoPatrocinado' => 'required|numeric',
            'MontoFondosPropios' => 'required|numeric'
        ]);
        $project->update([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'NombreProyecto' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->input('MontoPlanificado'),
            'MontoPatrocinado' => $request->input('MontoPatrocinado'),
            'MontoFondosPropios' => $request->input('MontoFondosPropios')
        ]);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function getPDF(){
        $projects = Project::all();
        $pdf = PDF::loadView('projects.PDF_Example', compact('projects'));
        return $pdf->stream('listaproyectos.pdf');
    }
}