@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <h2>Recepta lekarska</h2>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('prescriptions/create') }}"> Dodaj nową receptą</a><br/><br/>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Patient</th>
            <th scope="col">Doctor</th>
            <th scope="col">Recepta</th>
            <th scope="col">Operacje</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prescriptions as $prescription)
        <tr>
            <th scope="row">{{ $prescription->id }}</th>
            <td>{{ $prescription->patient->name }}({{$prescription->patient->pesel}})</td>
            <td>{{ $prescription->doctor->name}}</td>
            <td>{{ $prescription->prescriptions }}</td>
            <td>
                <a class="text-info"  href="{{ URL::to('prescriptions/edit/' . $prescription->id) }}">edycja recepta</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection('content')