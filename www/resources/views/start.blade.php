@extends('layouts.master')

@section('top')
  @include('partials/nav')
@endsection

@section('main')
  <thread></thread>      
@endsection

@section('bottom')
  <messageinput v-on:posted="updateThread"></messageinput>
@endsection


        
    
