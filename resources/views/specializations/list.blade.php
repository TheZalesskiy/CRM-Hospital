@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <h2>Specjalizacja</h2>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('specializations/create') }}"> Dodaj nową specializację</a><br/><br/>
    
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($specializations as $specialization)
        <tr>
            <th scope="row">{{ $specialization->id }}</th>
            <td><a href="{{ URL::to('doctors/specializations/' . $specialization->id) }}"> {{$specialization->name }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection('content')