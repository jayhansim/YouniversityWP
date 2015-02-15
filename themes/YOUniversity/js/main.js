/*!
 * Simple jQuery Equal Heights
 *
 * Copyright (c) 2013 Matt Banks
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://docs.jquery.com/License
 *
 * @version 1.5.1
 */
!function(a){a.fn.equalHeights=function(){var b=0,c=a(this);return c.each(function(){var c=a(this).innerHeight();c>b&&(b=c)}),c.css("height",b)},a("[data-equal]").each(function(){var b=a(this),c=b.data("equal");b.find(c).equalHeights()})}(jQuery);

$(document).ready(function(){

  // equal heights for article listings
  //$('.articles-list .article').equalHeights();

  // newsletter signup
  $('#newsletterSignUp').submit(function(e){

    var thisForm = $(this);

    var data = {
      ajax : 'true',
      apikey : 'ec610f63ed8de9882a845729476d9f42-us9',
      id : '82d33dcd55',
      email_address: $('#newsletterName').val(),
      output: 'jsonp',
      double_optin: 'false',
      update_existing : 'true',
      merge_vars : {
        'EMAIL' : $('#newsletterName').val()
      }
    };

    $.ajax({
      type : 'POST',
      url : 'http://us9.api.mailchimp.com/1.3/?method=listSubscribe',
      data : data,
      dataType : 'jsonp',
      beforeSend : function(){
        $('#btn-newsletterSubmit').text('Submitting...').attr('disabled', 'disabled');
      }
    }).complete(function(){
      thisForm.find('.input-group').fadeOut(function(){
        $('#newsletterSignUp').append('<h5>Thanks for signing up! :D</h5>').hide().fadeIn();
      });
    });

    e.preventDefault();
  });
});

