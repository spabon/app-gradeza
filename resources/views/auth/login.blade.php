@extends('layouts.app')

@section('body-class','signup-page')



@section('content')
<div class="header header-filter" style="background-image: url('{{ ('img/city.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header header-primary text-center">
                            <h4>Inicio de sesión</h4>
                           
                        </div>
                        <p class="text-divider">Ingresa tus datos</p>
                        <div class="content">

                          

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                               
                                <input id="email" type="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input  placeholder="Password..." id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                            </div>

                            

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div> 
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

</div>
@endsection
