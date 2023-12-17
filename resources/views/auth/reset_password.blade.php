@extends('layouts.auth')
@section('title', 'Update password')

@section('content')
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

        <!-- Card UIkit -->
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-width-1-3@l">
            <!-- Logo -->
            <img class="uk-margin logo uk-align-center " src="/image/logo.svg" alt="Logo">

            <h3 class="uk-card-title">Password baru</h3>

            <p class="uk-text-muted">Untuk menjaga keamanan akun anda silahkan gunakan password yang kuat.</p>
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

            <form class="uk-form-stacked" method="POST" action="{{ route('update.password') }}">
                @csrf
                @method('put')
                <input type="hidden" name="token" value="{{ request()->token }}">
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input uk-border-rounded" id="password" name="password" type="password"
                            placeholder="Password">
                        @error('password')
                            <small class="uk-text-small uk-text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="confirm_password">Konfirmasi Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input uk-border-rounded" id="confirm_password" name="confirm_password"
                            type="password" placeholder="Password">
                        @error('confirm_password')
                            <small class="uk-text-small uk-text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- Tombol Login -->
                <div class="uk-margin">
                    <button class="uk-button  uk-border-rounded uk-button  uk-button-primary uk-width-1-1"
                        type="submit">Update password</button>
                </div>

            </form>
        </div>
    @endsection
