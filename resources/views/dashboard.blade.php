@extends('layouts.administration')

@section('content')



{{--
    @if(Auth::user()->type=="admin")
            @include('dashboards.administrateur_dashboard')
    @endif --}}

    {{-- @if(Auth::user()->type=="c_individuel")
            @include('dashboards.consultant_dashboard')
    @endif --}}


    @if(Auth::user()->type=="s_privee")
            @include('dashboards.prive_dashboard')
    @elseif(Auth::user()->type=="c_individuel")
    @include('dashboards.consultant_dashboard')
    @elseif(Auth::user()->type=="admin")
    @include('dashboards.administrateur_dashboard')
    @else
          @include('dashboards.public_dashboard',['marches'=>$marches])
    @endif



@endsection
