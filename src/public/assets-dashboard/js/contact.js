$(function () {

	'use strict';

    $("form#create-contact-us").on("submit", function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: $this.prop('action'),
            method: $this.prop('method'),
            dataType: 'json',
            data: $this.serialize(),
            beforeSend: function() {
                $("#custom-popup").show();
                $("#custom-popup #message").html("sending...");
            },
            success: function(data) {
                $("#custom-popup #message").html(data.message);
                // $("#response").html(data);
                $(':input','form#create-contact-us')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .prop('checked', false)
                    .prop('selected', false);
            }
        });
    });
    $('div#custom-popup').on('click', function(){
        $(this).hide();
    })
    $('button.close').on('click', function(){
        $(this).parent().hide();
    })
});
