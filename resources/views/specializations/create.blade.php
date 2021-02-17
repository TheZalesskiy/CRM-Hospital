@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Dodawania specjalizacji</h2>
    <form action="{{ action ('App\Http\Controllers\SpecializationController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
<div class="form-group">
    <label for="name">Nazwa specjalizajci</label>
    <input type="text" class="form-control" name="name" />

</div>
<input type="submit" value="dodaj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')