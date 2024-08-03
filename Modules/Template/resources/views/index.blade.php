@extends('template::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('template.name') !!}</p>
@endsection
