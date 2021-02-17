@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Edycja wizyta</h2>
    <form action="{{ action ('App\Http\Controllers\VisitController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $visit->id }}" />
        <div class="form-group">
            <label for="name">Lekarz:</label>
            <select name="doctor">
        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">Pacjent:</label>
            <select name="patient">
                <option value="{{$patient->id}}">{{$patient->name}}</option>
                    </select>
        </div>
        
        
        <div class="form-group">
            <label for="name">Data wizyty:</label>
            <input type="text" class="form-control" name="date" value="{{ $visit->date }}" />
        </div>

        <input type="submit" value="edycja" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')