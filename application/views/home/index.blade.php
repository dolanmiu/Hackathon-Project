@layout('main')

@section('content')

@if(Auth::check())
	<h1>Awesome, you're logged in</h1>
	<div class="row">
		<div class="span6">Button1</div>
		<div class="span6">Button2</div>
	</div>
@else
  <h1>You should sign up!</h1>
  <div class="row">
    <div class="span6">Button1</div>
    <div class="span6">Button2</div>
  </div>
@endif

<ul>
@foreach($charities as $c)
	<li>{{ $c->name }}</li>	
@endforeach
</ul>
@endsection
