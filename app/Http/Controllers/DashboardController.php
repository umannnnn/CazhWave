<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.courses.index', [
            'title' => 'My Courses',
            'courses' => Course::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.courses.create', [
            'title' => 'Create New Course',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:courses',
            'link' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->description), 120);
    
        Course::create($validateData);

        return redirect('/dashboard/courses')->with('success', 'New course has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.show', [
            'title' => 'Course Details',
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', [
            'title' => 'Edit Course',
            'course' => $course,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            'title' => 'required|max:255',
            'link' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ];

        if($request->slug != $course->slug) {
            $rules['slug'] = 'required|unique:courses';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 50);
    
        Course::where('id', $course->id)
            ->update($validatedData);

        return redirect('/dashboard/courses')->with('success', 'Course has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect('/dashboard/courses')->with('success', 'Course has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Course::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
