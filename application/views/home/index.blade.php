@layout('main')

@section('content')

@if(Auth::check())

@else

@endif


<hr class="featurette-divider">
<div class="featurette"> <img class="featurette-image pull-right" src="assets/img/homepage-big1.jpg">
  <h2 class="featurette-heading">Raise money. <span class="muted">To support those in need.</span></h2>
  <a class="btn btn-large btn-success" href="{{ URL::to_action('charity@create') }}">I am a Charity</a>
  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
</div>
<hr class="featurette-divider">
<div class="featurette">
  <h2 class="featurette-heading">Donate money. <span class="muted">See for yourself.</span></h2>
  <a class="btn btn-large btn-success" href="{{ URL::to_action('charity@index') }}">I want to Donate</a>
  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
</div>
<hr>
<div class="indexbanner">
<!--<div class="row-fluid indexbanner"> -->
  <img class="screenbanner" src="assets/img/homepage-jumbotron.png">
  <div class="row">
    <div class="span3"> <img class="img-circle" data-src="holder.js/140x140">
      <h2>Who are we?</h2>
      <p>SocialPledge is a novel way for charities to accept one-off and regular pledge donations. It allows users to share their charitable donations on their Facebook timeline, and thus increases public awareness of the projects these donations are being used for. Additionally it provides charities with valuable demographic information about their donor base thanks to the integration with Facebook.</p>
      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <!-- /.span4 -->
    <div class="span3"> <img class="img-circle" data-src="holder.js/140x140">
      <h2>Why?</h2>
      <p>Because we believe in giving. We believe helping others is the greatest form of positive karma. Spread the word, donate to potentially save a life and shape the world for the greater good! Motivate your circle of friends to give, help others. Happiness is contagious!</p>
      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <!-- /.span4 -->
    <div class="span4"> <img class="img-circle" data-src="holder.js/140x140">
      <h2>I am still not sure...</h2>
      <p>What are you waiting for! Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <!-- /.span4 --> 
  </div>
  <!-- /.row -->
  </div>

@endsection
