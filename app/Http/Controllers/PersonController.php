<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Course;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    public function index()
    {
        
        $role = request('role');
        $query = Person::with('courses');
        if ($role) {
            $query->where('role', $role);
        }
        $people = $query->paginate(15)->withQueryString();
        $roles  = ['Student','Parent','Personal'];
        return view('people.index', compact('people','roles','role'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('people.create', compact('courses'));
    }

   public function store(PersonRequest $request)
{
    // create the person
    $person = Person::create($request->only(['name','role','group_count']));

    // attach any courses
    $person->courses()->sync($request->input('courses', []));

    return redirect()->route('people.index')
                     ->with('success','Person added.');
}


    public function edit(Person $person)
    {
        $courses = Course::all();
        return view('people.edit', compact('person','courses'));
    }

    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->validated());
        $person->courses()->sync($request->courses);
        return redirect()->route('people.index')
                         ->with('success','Person updated.');
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return back()->with('success','Person deleted.');
    }
}

