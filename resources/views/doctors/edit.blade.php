@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
    <h2> Edycja lekarza</h2>
    <form action="{{ action ('App\Http\Controllers\DoctorController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input type="hidden" name="id" value="{{ $doctor->id}}" />
        <div class="form-group">
            <label for="name">Nazwisko i Imię</label>
            <input type="text" class="form-control" name="name" value="{{$doctor->name}}"/>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{$doctor->email}}"/>
        </div>
        
        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="phone" class="form-control" name="phone"value="{{$doctor->phone}}" />
        </div>
        <div class="form-group">
            <label for="adress">Adres</label>
            <input type="adress" class="form-control" name="adress" value="{{$doctor->adress}}"/>
        </div>
        <div class="form-group">
            <label for="pesel">Pesel</label>
            <input type="text" class="form-control" name="pesel" value="{{$doctor->pesel}}"/>
        </div>

        <div class="form-group">
            <label for="pesel">Status</label>
            @if ($doctor->status == "true")
            Aktywny<input type="radio" class="form-control" name="status" value="true" checked="checked"/>
            Nieaktywny<input type="radio" class="form-control" name="status" value="false" />
            @else
            Aktywny<input type="radio" class="form-control" name="status" value="true" />
            Nieaktywny<input type="radio" class="form-control" name="status" value="false" checked="checked" />
            @endif
        </div>
        <div class="form-group">
            <label for="specialization">Specjalizacja</label>
            @foreach($specializations as $specialization)
            @if ($doctor->specializations->contains($specialization->id))
            <input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" checked />{{ $specialization->name }}
            @else
            <input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" />{{ $specialization->name }}
            @endif
            @endforeach
        </div>

        <input type="submit" value="edycja" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')