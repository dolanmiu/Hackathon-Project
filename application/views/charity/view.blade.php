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
           <form id='payment-form' method='post' action='{{ URL::to_action('charity@donate', array($charity->id)) }}'>

            <!-- Button to trigger modal -->
             
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
              </div>
              <div class="modal-body">


               <!-- Do not put "name" in input tags, safety measure -->
              <div class="form-row"><label>Card Number</label>
                  <input class="card-number" type="text" size="20" value="4111111111111111"/></div>

              <div class="form-row"><label>CVC</label>
                  <input class="card-cvc" type="text" size="4" value="111"/></div>

              <div class="form-row"><label>Cardholder's Name</label>
                  <input class="card-holdername" type="text" size="20" value="lala"/></div>

              <div class="form-row"><label>E-mail</label>
                  <input name="email" class="email" type="text" size="20" value="lala"/></div>

              <div class="form-row"><label>Expiry date (MM/YYYY)</label>
                  <input class="card-expiry-month" type="text" size="2" value="12"/>

                  <span> / </span>

                  <input class="card-expiry-year" type="text" size="4" value="2015"/></div>

              <div class="form-row"><label>Amount</label>
                  <input name="amount" class="amount" type="text" size="5" value="10.00"/></div>
                  
              <div class="form-row"><label>Monthly (every n months)</label>
                  <input name="monthly" class="monthly" type="text" size="5" value="1"/></div>

              <div class="form-row"><label>Currency</label>
                  <input name="currency" class="currency" type="text" size="3" value="EUR"/></div>

              <button class="submit-button" type="submit">Submit</button>




              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
              </div>
            </div>

          </form>





            <dl class="dl-horizontal">
              <dt>Type of donation</dt>
              <dd>
                <select name="donationType" id="donationType">
                  <option value='single'>single donation </option>
                  <option value='recurring'>monthly donation </option>
                </select>

              </dd>
              <dt>Amount</dt>
              <dd>
                <div class="input-prepend input-append"> <span class="add-on">£</span>
                  <input class="span10" id="appendedPrependedInput" type="text" name='amount' value='10'>
                  <span class="add-on">.00</span> </div>
              </dd>
              <div id="frequencySlider">
              <dt>How often (Monthly only)</dt>
                <dd>
                  <input type="text" class="sl1" value="" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="-14" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="show">
                </dd>
              </div>
              <dt></dt>
              <dd>
                <div class="span1 offset8">
                  <a href="#myModal" role="button" class="btn" data-toggle="modal">Submit</a>
                </div>
              </dd>
            </dl>
            </div>

        </div>
      </div>
    </div>
    <!--donation bar and description--> 
    
  </div>

  @endsection
  @section('scripts')
    
    <script>
      $(function(){
        // $('#dk_container_donationType').on('mouseup', function(){
        //   var showSlider = $('#donationType').val() == "recurring";
        //   console.log($('#donationType').val())
        //   $('#frequencySlider').toggle(showSlider);
        // });
      });
    </script>


    <script type="text/javascript">
        var PAYMILL_PUBLIC_KEY = '891010255736d9d46d379a5f39499223';

        $(document).ready(function () {

            function PaymillResponseHandler(error, result) {

                if (error) {

                    // Zeigt den Fehler überhalb des Formulars an
                    $(".payment-errors").text(error.apierror);


                } else {
                    $(".payment-errors").text("");

                    var form = $("#payment-form");

                    // Token
                    var token = result.token;

                    // Token in das Formular einfügen damit es an den Server übergeben wird
                    form.append("<input type='hidden' name='paymillToken' value='" + token + "'/>");
                    // form.append("<input type='hidden' name='amount' value='10.00'/>");
                    // form.append("<input type='hidden' name='currency' value='EUR'/>");

                    form.get(0).submit();
                }

                $(".submit-button").removeAttr("disabled");
            }

            $("#payment-form").submit(function (event) {
                // Absenden Button deaktivieren um weitere Klicks zu vermeiden
                $('.submit-button').attr("disabled", "disabled");

                if (false == paymill.validateCardNumber($('.card-number').val())) {
                    $(".payment-errors").text("Ungueltige Kartennummer");
                    $(".submit-button").removeAttr("disabled");
                    return false;
                }

                if (false == paymill.validateExpiry($('.card-expiry-month').val(), $('.card-expiry-year').val())) {
                    $(".payment-errors").text("Ungueltiges Gueltigkeitsdatum");
                    $(".submit-button").removeAttr("disabled");
                    return false;
                }

                paymill.createToken({
                    number:$('.card-number').val(),
                    exp_month:$('.card-expiry-month').val(),
                    exp_year:$('.card-expiry-year').val(),
                    cvc:$('.card-cvc').val(),
                    cardholdername:$('.card-holdername').val(),
                    amount:$('.amount').val(),
                    currency:$('.currency').val()
                }, PaymillResponseHandler);

                return false;
            });
        });

    </script>
  @endsection
