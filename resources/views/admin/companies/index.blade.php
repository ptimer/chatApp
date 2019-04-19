@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 mx-auto">
                <div class="panel panel-default">
                    <h2>Companies</h2>
                    <a href="{{ $browser_url }}">Вк</a>
                    <div class="panel-body" >
                        <router-view name="companiesIndex"></router-view>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
