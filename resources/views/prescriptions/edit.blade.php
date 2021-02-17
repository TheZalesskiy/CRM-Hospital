@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Edycja receptą</h2>
    <form action="{{ action ('App\Http\Controllers\PrescriptionController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
        <input type="hidden" name="id" value="{{ $prescriptions->id }}" />

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
    <label for="name">Recepta lekarska:</label>
    <input type="text" class="form-control" name="prescriptions" value = {{ $prescriptions->prescriptions }} />
</div>
<input type="submit" value="edytuj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')