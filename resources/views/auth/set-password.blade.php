@extends('layouts.auth')
@section('title', 'Update password')

@section('content')
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

        <!-- Card UIkit -->
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-width-1-3@l">
            <!-- Logo -->
            <img class="uk-margin logo uk-align-center " src="/image/logo.svg" alt="Logo">

            <h3 class="uk-card-title">Setup Password</h3>

            <p class="uk-text-muted">Untuk melanjutkan mohon lengkapi password anda.</p>
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

            <form class="uk-form-stacked" method="POST" action="{{ route('login.google.setPassword') }}">
                @csrf
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
                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Simpan password</button>
                </div>

            </form>
        </div>
    @endsection
