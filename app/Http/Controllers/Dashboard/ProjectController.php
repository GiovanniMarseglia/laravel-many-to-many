<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Type::All();
        $technologias = Technologia::All();
        return view('layouts.create',compact('type','technologias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'thumb' => ['nullable'],
            'date' => ['required'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologias' => ['exists:technologias,id']
        ]);


        $formData = $request->all();

        $slug = Project::generateSlug($request->title);
        $formData['slug'] = $slug;

        if ($request->hasFile('thumb')) {
            $image = $request->file('thumb');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
        }

        // $request->image->storeAs('images', $imageName);




        $newProject = new Project();
        $newProject->fill($formData);
        if(!empty($imageName)){

            $newProject->thumb = $imageName;
        }


        $newProject->save();


        if($request->has('technologias')){
            $newProject->technologias()->attach($request->technologias);
        }


        return redirect()->route('home');


    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {


        return view("layouts.single",compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $type = Type::All();
        $technologias = Technologia::All();
        return view("layouts.edit",compact('project','type','technologias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'thumb' => ['nullable'],
            'date' => ['required'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologias' => ['exists:technologias,id']
        ]);



        $formData = $request->all();
        $project = project::find($id);

        if ($request->hasFile('thumb')) {
            if( $project->thumb ){
                Storage::delete('public/images/' . $project->thumb);
            }


            $image = $request->file('thumb');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
        }


        $formData['thumb']=$imageName;

        $project->update($formData);


        if($request->has('technologias')){
            $project->technologias()->sync($request->technologias);
        }

        return redirect()->route("home",compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $project = project::find($id);
        $project->technologias()->sync([]);
        if( $project->thumb ){
            Storage::delete('public/images/' . $project->thumb);
        }
        $project->delete();
        return redirect()->route('home');
    }
}
