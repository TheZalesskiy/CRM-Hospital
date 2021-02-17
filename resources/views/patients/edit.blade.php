@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Edycja lekarza</h2>
    <form action="{{ action ('App\Http\Controllers\PatientController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input type="hidden" name="id" value="{{ $patient->id}}" />
        <div class="form-group">
            <label for="name">Nazwisko i Imię</label>
            <input type="text" class="form-control" name="name" value="{{$patient->name}}"/>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{$patient->email}}"/>
        </div>
        
        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="phone" class="form-control" name="phone"value="{{$patient->phone}}" />
        </div>
        <div class="form-group">
            <label for="adress">Adres</label>
            <input type="adress" class="form-control" name="adress" value="{{$patient->adress}}"/>
        </div>
        <div class="form-group">
            <label for="pesel">Pesel</label>
            <input type="text" class="form-control" name="pesel" value="{{$patient->pesel}}"/>
        </div>

        <div class="form-group">
            <label for="disease">Choroby</label>
            @foreach($diseases as $disease)
            @if ($patient->disease->contains($disease->id))
            <input type="checkbox" class="form-control" name="diseases[]" value="{{ $disease->id }}" checked />{{ $disease->name }}
            @else
            <input type="checkbox" class="form-control" name="diseases[]" value="{{ $disease->id }}" />{{ $disease->name }}
            @endif
            @endforeach
        </div>

        <input type="submit" value="edycja" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')