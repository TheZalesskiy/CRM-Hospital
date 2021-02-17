@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <h2>Rejestracja</h2>
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
                
            
                    <input type="hidden" name="status" value="true" />
            
                    <input type="submit" value="dodaj" class=" btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
