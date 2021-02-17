@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Dodawania choroby</h2>
    <form action="{{ action ('App\Http\Controllers\DiseaseController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
<div class="form-group">
    <label for="name">Nazwa choroby</label>
    <input type="text" class="form-control" name="name" />

</div>
<input type="submit" value="dodaj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')