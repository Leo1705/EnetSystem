<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Course;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people  = Person::with('courses')->get();
        $courses = Course::all();

        return view('people', compact('people','courses'));
    }

    public function store(Request $request)
    {

        // TODO: Check request

        // Validation logic in app not in DB
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'group_count' => 'required|integer|min:1',
            'role'        => 'required|in:Student,Parent',
            'courses'     => 'array',
            'courses.*'   => 'exists:courses,id',
        ]);

        $person = Person::create($data);
        // TODO: Call repo layer method for storing a person
        $person->courses()->sync($request->courses ?? []);

        return redirect()->route('people.index');
    }

    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'group_count' => 'required|integer|min:1',
            'role'        => 'required|in:Student,Parent',
            'courses'     => 'array',
            'courses.*'   => 'exists:courses,id',
        ]);

        $person->update($data);
        $person->courses()->sync($request->courses ?? []);

        return redirect()->route('people.index');
    }

    public function destroy(Person $person)
    {
        $person->courses()->detach();
        $person->delete();
        return redirect()->route('people.index');
    }
}
