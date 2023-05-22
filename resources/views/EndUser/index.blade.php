@extends('EndUser.layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

        <!-- Header -->
        @include('EndUser.layouts.header')
        <!-- About Section -->
        @include('EndUser.layouts.about')
        <!-- Restaurant Menu Section -->
        @include('EndUser.layouts.menu')
        <!-- Portfolio Section -->
        @include('EndUser.layouts.portfolio')
        <!-- Team Section -->
        @include('EndUser.layouts.team')
        <!-- Call Reservation Section -->
        @include('EndUser.layouts.call_resercation')

@endsection


@section('scripts')

@endsection
