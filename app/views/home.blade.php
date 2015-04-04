@extends('layout.main')

@section('content')
	@if (Auth::check())
		<p>Hell0, {{ Auth::user()->username }}</p>
	@else
		<p>You are not signed in.</p>
	@endif
@stop