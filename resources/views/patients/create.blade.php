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

    <h2> Dodawania pacyjenta</h2>
    <form action="{{ action ('App\Http\Controllers\PatientController@store') }}" method="POST" role="form">
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
            <label for="phone">Telefon</label>
            <input type="text" class="form-control" name="phone" />
        </div>
        <div class="form-group">
            <label for="adress">Adres</label>
            <input type="text" class="form-control" name="adress" />
        </div>
        <div class="form-group">
            <label for="pesel">Pesel</label>
            <input type="text" class="form-control" name="pesel" />
        </div>
        <div class="form-group">
            <label for="disease">Choroby</label>
            @foreach($diseases as $disease)
            <input type="checkbox" class="form-control" name="diseases[]" value="{{ $disease->id }}" />{{ $disease->name }}

            @endforeach
        </div>

        <input type="submit" value="dodaj" class=" btn btn-primary" />
    </form>

</div>
@endsection('content')