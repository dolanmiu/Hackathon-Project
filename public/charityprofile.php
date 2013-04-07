<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Social Pledge - Sharing is Caring</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/override.css" rel="stylesheet">
<!-- Loading Flat UI -->
<link href="assets/css/flat-ui.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/slider.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>

<body>
<div class="container">
  <div class="masthead">
    <ul class="nav nav-pills pull-right">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="allcharities.php">All Charites</a></li>
      <li><a href="signin.php">Sign In</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
    <h3 class="muted"><img src="images/logo.png"></h3>
  </div>
  <hr>
  <div class="row-fluid marketing"> 
    <!--charity name-->
    <div class="row">
      <div class="span10 offset1">
        <div class="span2"> <img src="http://appsforipads.net/wp-content/uploads/2011/01/Free_Google-150x150.png" class="img-polaroid" width="150" height="150"> </div>
        <div class="span8">
          <h1>Charity name</h1>
          <h3>What we are about</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <h3>Please Donate</h3>
          <div class="span12">
          <form>
            <dl class="dl-horizontal">
              <dt>Type of donation</dt>
              <dd>
                <select>
                  <option> single donation </option>
                  <option> monthly donation </option>
                </select>
              </dd>
              <dt>Amount</dt>
              <dd>
                <div class="input-prepend input-append"> <span class="add-on">£</span>
                  <input class="span10" id="appendedPrependedInput" type="text">
                  <span class="add-on">.00</span> </div>
              </dd>
              <dt>How often (Monthly only)</dt>
              <dd>
                <input type="text" class="sl1" value="" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="-14" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
              </dd>
              <dt></dt>
              <dd>
              <div class="span1 offset8">
                <button type="submit" class="btn">Submit</button>
                </div>
              </dd>
            </dl>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--donation bar and description--> 
    
  </div>
  <hr>
  <?php include 'footer.html'; ?>
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="assets/js/jquery.js"></script> 
<script src="assets/js/bootstrap-transition.js"></script> 
<script src="assets/js/bootstrap-alert.js"></script> 
<script src="assets/js/bootstrap-modal.js"></script> 
<script src="assets/js/bootstrap-dropdown.js"></script> 
<script src="assets/js/bootstrap-scrollspy.js"></script> 
<script src="assets/js/bootstrap-tab.js"></script> 
<script src="assets/js/bootstrap-tooltip.js"></script> 
<script src="assets/js/bootstrap-popover.js"></script> 
<script src="assets/js/bootstrap-button.js"></script> 
<script src="assets/js/bootstrap-collapse.js"></script> 
<script src="assets/js/bootstrap-carousel.js"></script> 
<script src="assets/js/bootstrap-typeahead.js"></script> 
<script src="assets/js/bootstrap-slider.js"></script> 
<script>
		$(function(){
			//window.prettyPrint && prettyPrint();

        $('.sl1').slider();
    });
  </script> 

<!-- Load JS here for greater good =============================--> 

<script src="assets/js/jquery.dropkick-1.0.0.js"></script> 
<script src="assets/js/custom_checkbox_and_radio.js"></script> 
<script src="assets/js/custom_radio.js"></script> 
<script src="assets/js/jquery.tagsinput.js"></script> 
<script src="assets/js/bootstrap-tooltip.js"></script> 
<script src="assets/js/jquery.placeholder.js"></script> 
<script src="http://vjs.zencdn.net/c/video.js"></script> 
<script src="assets/js/application.js"></script> 
<!--[if lt IE 8]>
      <script src="js/icon-font-ie7.js"></script>
      <script src="js/icon-font-ie7-24.js"></script>
    <![endif]-->
</body>
</html>
