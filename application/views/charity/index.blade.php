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
        
          <dt><h2><a href="{{ URL::to_action('charity@view', array($c->id)) }}">{{ $c->name }}</a></h2></dt>
          <dd><h4>description</h4></dd>
          <dd><strong>Total donators: {{ $c->people_total }}</strong></dd>
          <dd><strong>Donated amount: {{ $c->donation_total }}</strong></dd>
        
      @endforeach

    </dl>
        </div>
    </div>
     
      </div>

@endsection