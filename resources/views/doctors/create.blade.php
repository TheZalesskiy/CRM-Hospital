@extends('template')

@section('title')
@if(isset($title))
- {{$title}}
@endif
@endsection

@section('content')
<div class="container">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>
    
@endif

    <h2> Dodawania lekarza</h2>
    <form action="{{ action ('App\Http\Controllers\DoctorController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <label for="name">Nazwisko i Imię</label>
            <input type="text" class="form-control" name="name" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="phone" class="form-control" name="phone" />
        </div>
        <div class="form-group">
            <label for="adress">Adres</label>
            <input type="adress" class="form-control" name="adress" />
        </div>
        <div class="form-group">
            <label for="pesel">Pesel</label>
            <input type="text" class="form-control" name="pesel" />
        </div>
        <div class="form-group">
            <label for="specialization">Specjalizacja</label>
            @foreach($specializations as $specialization)
            <input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" />{{ $specialization->name }}

            @endforeach
        </div>

        <input type="hidden" name="status" value="true" />

        <input type="submit" value="dodaj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')