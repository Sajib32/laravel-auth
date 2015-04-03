<nav>
	<ul>
		<li><a href="{{ URL::route('home') }}">Home</a></li>
		@if (Auth::check())

		@else
			<li><a href="{{ URL::route('account-create') }}">Create an account</a></li>
		@endif	
	</ul>
</nav>