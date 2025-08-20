@extends('layouts.app')

@section('content')
  <div class="main-content">
    <h1 class="page-title">Manage {{ $person->name }}</h1>
    <form method="POST" action="{{ route('people.update', $person) }}">
      @method('PUT')
      @include('people._form')
    </form>
  </div>
@endsection
