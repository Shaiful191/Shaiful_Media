<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    //Show all Blogs
    public function index()
    {

        return view('blogs.index', [
            'blogs' => Blog::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6)
           
        ]);
    }

    //show single Blog
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }

    //Show create Form
    public function create()
    {
        return view("blogs.create");
    }

    //Store Blog Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',        
            'tags' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Blog::create($formFields);

        return redirect('/')->with('message', 'Blog created successfully!');
    }

    //Show edit form:
    public function edit(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    //Update Blog Data
    public function update(Request $request, Blog $blog)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $blog->update($formFields);

        return back()->with('message', 'Blog updated successfully!');
    }


    // Delete Blog:
    public function destroy(Blog $blog)
    {     
        $blog->delete();
        return redirect('/')->with('message', 'Blog deleted successfully.');
    }

    // Manage Blog:
    public function manage()
    {

        return view('blogs.manage', [
               
                'blogs' => Blog::latest()->get()
            ]
        );
    }
}
