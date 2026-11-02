@extends('layouts.app')

@section('app-content')
    <h1>Hello Class</h1>
    <p>I am dynamic page 1</p>
    <p>Price is: {{ $myprice }}</p>
@endsection

@section('title')
    <h1>{{  $mytitle  }}</h1>


    @if($flag)
    <p>The flag is true</p>
    @else
<p>the flag is false</p>

    @endif



@endsection
