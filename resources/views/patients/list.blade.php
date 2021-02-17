@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">    
    <nav class="navbar navbar-light bg-light">
        <h2>Pacjenci</h2>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('patients/create') }}">dodaj pacyjenta</a><br/><br/>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Choroba</th>
            <th scope="col">Recepty</th>
            <th scope="col">Operacje</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patientsList as $patient)
        <tr>
            <th scope="row">{{ $patient->id }}</th>
            <td><a class="text-info" href="{{ URL::to('patients/' . $patient->id ) }}">{{$patient->name}}</a></td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->phone }}</td>
            <td>
                <ul>
                @foreach($patient->disease as $disease)
               <li>{{$disease->name}}</li> 
                @endforeach
                </ul>
            </td>
            
            <td><a class="text-danger"  href="{{ URL::to('patients/delete/' . $patient->id) }}" onclick="return confirm('Czy napewno usunąć?')">usuń pacyjenta</a><br/>
                <a class="text-info"  href="{{ URL::to('patients/edit/' . $patient->id) }}">edycja pacyjenta</a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection('content')