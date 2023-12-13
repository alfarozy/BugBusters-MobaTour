@extends('layouts.auth')
@section('title', 'Register')

@section('content')
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

        <!-- Card UIkit -->
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-width-1-3@l">
            <!-- Logo -->
            <img class="uk-margin logo uk-align-center " src="/image/logo.svg" alt="Logo">

            <h3 class="uk-card-title">Register</h3>

            @if (session()->has('success'))
                <div class="uk-alert-success" uk-alert>
                    <p> {!! session()->get('success') !!} </p>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="uk-alert-danger" uk-alert>
                    <p> {!! session()->get('error') !!} </p>
                </div>
            @endif

            <!-- Form login menggunakan kelas UIkit -->
            <form class="uk-form-stacked" method="post" accept="{{ route('login') }}">
                @csrf
                <div class="uk-margin">
                    <label class="uk-form-label" for="full_name">Nama Lengkap</label>
                    <div class="uk-form-controls">
                        <input class="uk-input " name="name" id="full_name" type="text" placeholder="Nama Lengkap"
                            value="{{ old('name') }}">
                        @error('name')
                            <small class="uk-text-small uk-text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="Email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input " id="Email" name="email" type="email" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="uk-text-small uk-text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Field Password -->
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password" name="password" type="password" placeholder="Password">
                        @error('password')
                            <small class="uk-text-small uk-text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <!-- Tombol Login -->
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Register</button>
                </div>

                <hr>
                <div class="uk-grid-small uk-child-width-expand@s
uk-text-center" uk-grid>
                    <div>
                        <a href="{{ route('login') }}" class="uk-link-muted">Login sekarang</a>
                    </div>
                </div>
            </form>
        </div>
    @endsection
