@extends('layouts.dashboard')
@section('title', 'Moba tourney')
@section('content')
    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-divider uk-grid-medium uk-child-width-1-2 uk-child-width-1-4@l uk-child-width-1-5@xl"
                data-uk-grid>
                <div>
                    <span class="uk-text-small"></span>Pengguna</span>
                    <h1 class="uk-heading-primary uk-margin-remove  uk-text-primary">2.134</h1>
                </div>
                <div>

                    <span class="uk-text-small">Trunamen</span>
                    <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">8.490</h1>
                </div>

                <div>

                    <span class="uk-text-small">Registrasi Turnamen</span>
                    <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">9.543</h1>
                </div>
                <div>

                    <span class="uk-text-small">Profit</span>
                    <h2 class="uk-heading-primary uk-margin-remove uk-text-primary">Rp. 12.000.987</h2>
                </div>
            </div>
            <hr>
            <div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">

                <!-- panel -->
                <div class="uk-width-1-1@l">
                    <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                        <div class="uk-card-header">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto">
                                    <h4>Sales Chart</h4>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /panel -->
            </div>
        </div>
    </div>
@endsection
