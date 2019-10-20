@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i>
                    {{ __('Inicio') }}
                </div>
                <div class="card-body">
                    {{ __('Pagina Principal Frontend') }}
                </div>
            </div>
        </div>
    </div>
@endsection
