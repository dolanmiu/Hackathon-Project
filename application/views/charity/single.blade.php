@layout('main')

@section('content')

<!-- <div class="hero-unit">
    <h1>Heading</h1>
    <p>Tagline</p>
    <p> <a class="btn btn-primary btn-large"> Learn more </a> </p>
  </div> -->
  <div class="row-fluid marketing"> 
    <!--charity name-->
    <div class="row">
      <div class="span10 offset1">
        <div class="span2"> <img src="http://appsforipads.net/wp-content/uploads/2011/01/Free_Google-150x150.png" class="img-polaroid" width="150" height="150"> </div>
        <div class="span8">
          <h1>{{ $charity->name }}</h1>
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

  @endsection
