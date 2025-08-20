@extends('layouts.dashboard')

@section('page-title','Persons Management')

@section('header-right')
  <form action="{{ route('people.index') }}" method="get" class="flex space-x-2">
    <select name="role" class="form-input">
      <option value="">All Roles</option>
      @foreach($roles as $r)
        <option value="{{ strtolower($r) }}"
                {{ strtolower($role)===strtolower($r)?'selected':'' }}>
          {{ $r }}
        </option>
      @endforeach
    </select>
    <button type="submit" class="manage-button bg-blue-500 text-white px-4 rounded">
      Filter
    </button>
  </form>
  <a href="{{ route('people.create') }}"
     class="manage-button bg-green-500 text-white px-4 rounded">
    Add New Person
  </a>
@endsection

@section('content')
  @if($people->count())
    @foreach($people as $person)
      <div class="person-card">
        <div class="person-info">
          <div class="person-name">{{ $person->name }}</div>
          <div class="person-subject">
            {{ $person->courses->pluck('name')->join(', ') ?: '– no courses –' }}
          </div>
        </div>
        <div class="group-button">{{ $person->group_count }} Group</div>
        <div class="person-role">{{ ucfirst($person->role) }}</div>
        <a href="{{ route('people.edit', $person) }}" class="manage-button">Manage</a>
      </div>
    @endforeach

    <!-- simple paginator links -->
    <div class="mt-4">{{ $people->links() }}</div>
  @else
    <p>No people found.</p>
  @endif
@endsection

