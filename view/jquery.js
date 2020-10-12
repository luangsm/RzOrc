$(document).ready(function(){    
    $("#citycad").click( function() {
        $("#jumbotron").load("./pages/citycad.php");
    });
    $("#contenttrcad").click( function() {
        $("#jumbotron").load("./pages/contenttrcad.php");
    });
    $("#tourcad").click( function() {
        $("#jumbotron").load("./pages/tourcad.php");
    });
    $("#contenthtcad").click( function() {
        $("#jumbotron").load("./pages/contenthtcad.php");
    });
    $("#hotelcad").click( function() {
        $("#jumbotron").load("./pages/hotelcad.php");
    });
    $("#out").click( function() {
        $("#jumbotron").load("./pages/logout.php");
    });
    $("#profile").click( function() {
        $("#jumbotron").load("./pages/profile.php");
    });
    $("#new").click( function() {
        $("#jumbotron").load("./pages/clientcad.php");
    });
    $("#citylist").click( function() {
        $("#jumbotron").load("./pages/citylist.php");
    });
    $("#tourlist").click( function() {
        $("#jumbotron").load("./pages/tourlist.php");
    });
    $("#hotellist").click( function() {
        $("#jumbotron").load("./pages/hotellist.php");
    });
    $(function () {
        $('#profile').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/profile.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    $(function () {
        $('#contenttrform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/contenttour.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        $('#contenthtform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/contenthotel.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        $('#login').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/validation.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        $('#cityform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/city.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        $('#tourform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/tour.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        $('#hotelform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/hotel.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./");
                }
            });
        });
    });
    $(function () {
        var id = $("#id").val();
        $('#client').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/client.php',
                data: $('form').serialize(),
                success: function () {
                    $(window).attr('location', "./?id=" + id + "&class=20");
                }
            });
        });
    });
    $(function(){
        var p = 0;
        $('.demo-textarea').on('focus', function(){
            var isFocused = $(this).hasClass('pastable-focus');
            console && console.log('[textarea] focus event fired! ' + (isFocused ? 'fake onfocus' : 'real onfocus'));
        }).pastableTextarea().on('blur', function(){
            var isFocused = $(this).hasClass('pastable-focus');
            console && console.log('[textarea] blur event fired! ' + (isFocused ? 'fake onblur' : 'real onblur'));
        });
        $('.demo').on('pasteImage', function(ev, data){
            var blobUrl = URL.createObjectURL(data.blob);
            $('<div class="result"><img src="' + data.dataURL +'" ><input class="d-none" id="data" value="' + data.dataURL + '" name="data' + p + '"></div>').insertAfter(this);
            p = p + 1;
        }).on('pasteImageError', function(ev, data){
            alert('Oops: ' + data.message);
            if(data.url){
            alert('But we got its url anyway:' + data.url)
            }
        }).on('pasteText', function(ev, data){
            $('<div class="result"></div>').text('text: "' + data.text + '"').insertAfter(this);
        });
    });
});
                                                                                  









