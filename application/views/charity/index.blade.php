@layout('main')

@section('content')
<div class="hero-unit">
    <h1>All charities</h1>
    <p>Your help is greatly appreciated</p>
      </div>

      <hr>

      <div class="row-fluid marketing">
    <div class="span11 offset1">

    <div class="bs-docs-list">
    <dl>

      @foreach($charities as $c)
        
          <dt><h2><div class="span2"><a href="{{ URL::to_action('charity@view', array($c->id)) }}">{{ $c->name }}</a></div>
            <div class="span3"><a href="{{ URL::to_action('charity@map', array($c->id)) }}">Map</a></div>
          
        </h2></dt>
        <img src="{{$c->image}}" height="100">
          <dd><h4>{{$c->description}}</h4></dd>
          <dd><strong>Total donators: {{ $c->people_total }}</strong></dd>
          <dd><strong>Donated amount: {{ $c->donation_total }}</strong></dd>
        
      @endforeach

    </dl>
        </div>
    </div>
     
      </div>

@endsection