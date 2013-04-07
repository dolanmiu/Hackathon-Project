@layout('main')

@section('content')
<div class="hero-unit">
  <h1>All charities</h1>
  <p>Your help is greatly appreciated</p>
</div>
<hr>
<div class="row">
  <div class="span11">
    @foreach($charities as $c)
      <div class="span10 charity-list">
        <div class="span2"> <img src="{{$c->image}}" height="100" class="img-polaroid" width="150"> </div>
        <div class="span6">
          <h2><a href="{{ URL::to_action('charity@view', array($c->id)) }}">{{ $c->name }}</a></h2>
          <h4><a href="{{ URL::to_action('charity@map', array($c->id)) }}">Map</a></h4>
          <h4>{{$c->description}}</h4>
          <strong>Total donators: {{ $c->people_total }}, Donated amount: {{ $c->donation_total }}</strong> </div>
      </div>
      @endforeach 
      </div>
</div>
@endsection