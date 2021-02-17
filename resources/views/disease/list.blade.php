@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2>Choroby</h2>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('disease/create') }}"> Dodaj nową chorobę</a><br/><br/>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diseases as $disease)
        <tr>
            <th scope="row">{{ $disease->id }}</th>
            <td><a class="btn btn-outline-success"  href="{{ URL::to('patients/diseases/' . $disease->id) }}"> {{$disease->name }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection('content')