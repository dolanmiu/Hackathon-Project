<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <script type="text/javascript">
        var PAYMILL_PUBLIC_KEY = '891010255736d9d46d379a5f39499223';
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://bridge.paymill.de/"></script>
    <script type="text/javascript">

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
</head>
<body>
<h1>Paymill Test</h1>

<div class="payment-errors"></div>

<form id="payment-form" action="<?php echo URL::to_action("payment@submitsingle");?>" method="POST">
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

    <div class="form-row"><label>Currency</label>
        <input name="currency" class="currency" type="text" size="3" value="EUR"/></div>

    <button class="submit-button" type="submit">Submit</button>
</form>

</body>
</html>