@extends('layouts.default')

@section('title', 'Home')

@section('subheader', 'Home')
@section('subheader-link', route('home'))


@section('content')
    {{--<div class="m-content">--}}

        {{--<label></label>{{$user->roles->first()->name}}--}}
        {{--@php ($a = 0)--}}
        {{--@foreach($user->roles as $role)--}}
            {{--{{$role->name}}--}}
        {{--@if($role->name == 'HOP')--}}
                {{--@php ($a++)--}}
            {{--@elseif($role->name =='Admin')--}}
                {{--@php ($a++)--}}
            {{--@endif--}}
         {{--@endforeach--}}
        {{--{{$a}}--}}
        {{--{{ Auth::user()->email }}--}}

        {{--@foreach(Session::get('programme') as $test)--}}
            {{--{{$test->name}}--}}
        {{--@endforeach--}}

    {{--</div>--}}
  {{Session::get('ab')}}
@endsection


