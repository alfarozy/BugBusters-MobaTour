@extends('layouts.auth')
@section('title', 'Login admin')

@section('content')
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

        <!-- Card UIkit -->
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-width-1-3@l">
            <div class="uk-grid-small uk-child-width-expand@s
uk-text-center">
                <h3 class="uk-align-center">Login Admin</h3>
            </div>

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
            <form class="uk-form-stacked">

                <div class="uk-margin">
                    <label class="uk-form-label" for="Email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="Email" type="email" placeholder="Email">
                    </div>
                </div>

                <!-- Field Password -->
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password" type="password" placeholder="Password">
                    </div>
                </div>

                <!-- Tombol Login -->
                <div class="uk-margin">
                    <button class="uk-button uk-button-secondary uk-width-1-1" type="submit">Login</button>
                </div>
            </form>
        </div>
    @endsection
