@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Dodawania wizyty</h2>
    <form action="{{ action ('App\Http\Controllers\VisitController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 

<div class="form-group">
    <label for="name">Lekarz:</label>
    <select name="doctor">
@foreach ($doctors as $doctor)
<option value="{{$doctor->id}}">{{$doctor->name}}</option>
@endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Pacjent:</label>
    <select name="patient">
        @foreach ($patients as $patient)
        <option value="{{$patient->id}}">{{$patient->name}}</option>
        @endforeach
            </select>
</div>

<div class="form-group">
    <label for="name">Data wizyty:</label>
    <input type="text" class="form-control" name="date" />
</div>
<input type="submit" value="dodaj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')