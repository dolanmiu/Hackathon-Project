// Some general UI pack related JS

$(document).ready(function() {

    $('#donationType').dropkick({
      change: function (value, label) {
        console.log(value,label);
        var showSlider = $('#donationType').val() == "recurring";
        if(!showSlider)
        {
            $('.monthly').parents('.form-row').hide();
        }
        else
        {
            $('.monthly').parents('.form-row').show();

        }
        $('#frequencySlider').toggle(showSlider);
      }
    });

    // Todo list
    $(".todo li").click(function() {
        $(this).toggleClass("todo-done");
    });

    // Init tooltips
    $("[data-toggle=tooltip]").tooltip("show");

    // Init tags input
    $("#tagsinput").tagsInput();

    // Init jQuery UI slider
    $("#slider").slider({
        min: 1,
        max: 5,
        value: 2,
        orientation: "horizontal",
        range: "min",
    });

    // JS input/textarea placeholder
    $("input, textarea").placeholder();

    // Make pagination demo work
    $(".pagination a").click(function() {
        if (!$(this).parent().hasClass("previous") && !$(this).parent().hasClass("next")) {
            $(this).parent().siblings("li").removeClass("active");
            $(this).parent().addClass("active");
        }
    });

    $(".btn-group a").click(function() {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
    });

    // Disable link click not scroll top
    $("a[href='#']").click(function() {
        return false
    });

});

