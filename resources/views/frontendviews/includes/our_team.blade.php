@extends('layouts.frontend-app')

@section('title')
    GY-Housing
@endsection

@section('content')


    <section class="our-team">
        <div class="container">
            <h2 class="text-center heading">our team</h2>

            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{url('images/team/govinda.jpg')}}">
                </div>
                <div class="team-det text-center">
                    <p class="team-name">Govind Khatiwada</p>
                    <p class="team-position"></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{url('images/team/abhi.jpg')}}" height="255 px" width="395">
                </div>
                <div class="team-det text-center">
                    <p class="team-name">abhishek sharma</p>
                    <p class="team-position"></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{url('images/team/thapa.jpg')}}" height="255 px" width="395">
                </div>
                <div class="team-det text-center">
                    <p class="team-name">kamal thapa</p>
                    <p class="team-position"></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{url('images/team/bhat.jpg')}}" height="255 px" width="395">
                </div>
                <div class="team-det text-center">
                    <p class="team-name">prabhat Chapagain</p>
                    <p class="team-position"></p>
                </div>
            </div>
        </div>
    </section>

@endsection