@extends('layouts.dashboard')

@section('page-title','Add New Person')

@section('content')
  {{-- show any validation errors --}}
  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card w-96 mx-auto">
    <form action="{{ route('people.store') }}" method="POST" class="space-y-4 p-6">
      @csrf

      <div>
        <label class="block mb-1">Name</label>
        <input name="name" type="text" class="form-input w-full" value="{{ old('name') }}" required>
      </div>

      <div>
        <label class="block mb-1">Role</label>
        <select name="role" class="form-input w-full">
          <option value="student"  {{ old('role')=='student'  ? 'selected':'' }}>Student</option>
          <option value="parent"   {{ old('role')=='parent'   ? 'selected':'' }}>Parent</option>
          <option value="personal" {{ old('role')=='personal' ? 'selected':'' }}>Personal</option>
        </select>
      </div>

      <div>
        <label class="block mb-1">Group Count</label>
        <input name="group_count" type="number" min="1" 
               class="form-input w-full" 
               value="{{ old('group_count',1) }}" required>
      </div>

      <div>
        <label class="block mb-1">Assign Courses</label>
        <select name="courses[]" multiple class="form-input w-full h-24">
          @foreach($courses as $course)
            <option value="{{ $course->id }}"
              {{ collect(old('courses'))->contains($course->id) ? 'selected':'' }}>
              {{ $course->title }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit"
              class="manage-button bg-green-500 text-white px-4 py-2 rounded w-full">
        Save
      </button>
    </form>
  </div>
@endsection
