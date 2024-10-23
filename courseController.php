<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $courses =Course::all();
        return view ('course.index', comapct('courses'));
    } 


    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)

    {
        dd($request->all());

        $request-> validate([
            'title'=> 'required|string|max:255',
            'credit_hrs'=> 'required|integer', 
        ]);
        Course::create([
            'title'=> $request->title,
            'credit_hrs'=> $request->credit_hrs,
        ]);
        return redirect()->route('courses.index')->with('sucess','Course created successfully.');
    }

}
