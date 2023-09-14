@extends('commerce::layouts.master')

@section('content')
    <h1>Hello World</h1>
    <form action="{{ route() }}" method="post"></form>

    <p>
        This view is loaded from module: {!! config('commerce.name') !!}
    </p>
@endsection
