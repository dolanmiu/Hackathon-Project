@layout('main')

@section('content')

@if(Auth::check())

@else

@endif


<hr class="featurette-divider">
<div class="featurette"> <img class="featurette-image pull-right" src="assets/img/homepage-big1.jpg">
  <h2 class="featurette-heading">Raise money. <span class="muted">To support those in need.</span></h2>
  <a class="btn btn-large btn-success" href="#">I am a Charity</a>
  <p class="lead">Is your charity looking for funding? Why not join our online donation system? It’s easy, safe and secure! Create your page and start raising money right now!</p>
</div>
<hr class="featurette-divider">
<div class="featurette">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="muted">See for yourself.</span></h2>
  <a class="btn btn-large btn-success" href="#">I want to Donate</a>
</div>
<hr>
<div class="indexbanner">
<!--<div class="row-fluid indexbanner"> -->
	<div class="bannerpattern"></div>
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
