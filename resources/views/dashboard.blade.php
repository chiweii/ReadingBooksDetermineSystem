@extends('Master.master')

@section('title','儀表板')

@section('content')

@if(Session::get('user')['user_role'] == 'M')

@include('member.homepage')

@elseif((Session::get('user')['user_role'] == 'A'))

@endif

@endsection
