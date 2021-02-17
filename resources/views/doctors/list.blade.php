@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <h2>Lekarze</h2>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a class="btn btn-outline-success" href="{{ URL::to('doctors/create') }}">dodaj lekarza</a><br/><br/>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Specializations</th>
            <th scope="col">Status</th>
            <th scope="col">Operacje</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctorsList as $doctor)
        <tr>
            <th scope="row">{{ $doctor->id }}</th>
            <td><a class="text-info"  href="{{ URL::to('doctors/' . $doctor->id ) }}">{{$doctor->name}}</a></td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>
                <ul>
                @foreach($doctor->specializations as $specialization)
               <li>{{$specialization->name}}</li> 
                @endforeach
                </ul>
            </td>
            <td>{{ $doctor->status }}</td>
            <td><a class="text-danger" href="{{ URL::to('doctors/delete/' . $doctor->id) }}" onclick="return confirm('Czy napewno usunąć?')">usuń lekarza</a><br/>
            <a class="text-info" href="{{ URL::to('doctors/edit/' . $doctor->id) }}">edycja lekarza</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($statistic as $stat)
@if($stat->status == "true")
liczba lekarzy dostępnych: {{ $stat->user_count }}
@endif
@if($stat->status == "false")
liczba lekarzy niedostępnych: {{ $stat->user_count }}
@endif
@endforeach
</div>
@endsection('content')