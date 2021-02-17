@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <h2>Wizyty</h2>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('visits/create') }}"> Dodaj nową wizytę</a><br/><br/>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Patient</th>
            <th scope="col">Doctor</th>
            <th scope="col">Date</th>
            <th scope="col">Operacje</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visits as $visit)
        <tr>
            <th scope="row">{{ $visit->id }}</th>
            <td>{{ $visit->patient->name }} [pesel: {{$visit->patient->pesel}}]</td>
            <td>{{ $visit->doctor->name}}</td>
            <td>{{ $visit->date }}</td>
            <td><a class="text-danger"  href="{{ URL::to('visits/delete/' . $visit->id) }}" onclick="return confirm('Czy napewno usunąć?')">usuń wizytę</a><br/>
                <a class="text-info"  href="{{ URL::to('visits/edit/' . $visit->id) }}">edycja wizytę</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection('content')