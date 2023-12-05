@extends('layouts.auth')
@section('title', 'Lupa password')

@section('content')
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

        <!-- Card UIkit -->
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-width-1-3@l">
            <!-- Logo -->
            <img class="uk-margin logo uk-align-center " src="/image/logo.svg" alt="Logo">

            <h3 class="uk-card-title">Lupa password</h3>

            <p class="uk-text-muted">Silahkan inputkan email anda, kami akan mengirimkan instruksi untuk membuat password
                baru.</p>
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

            <form class="uk-form-stacked">

                <div class="uk-margin">
                    <label class="uk-form-label" for="Email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="Email" type="email" placeholder="Email">
                    </div>
                </div>
                <!-- Tombol Login -->
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Submit</button>
                </div>

                <hr>
                <div class="uk-grid-small uk-child-width-expand@s
uk-text-center" uk-grid>
                    <div>
                        <a href="#" class="uk-link-muted">Login sekarang</a>
                    </div>
                </div>
            </form>
        </div>
    @endsection
