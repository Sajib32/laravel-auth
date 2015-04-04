@extends('layout.main')

@section('content')
	<p>{{ $user->username }}  ({{ $user->email }}) </p>
@stop