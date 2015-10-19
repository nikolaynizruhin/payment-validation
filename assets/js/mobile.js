$(document).ready(function(){

  /**
   * Show success or error messages
   */
  function showMessage() {
    var success = $(".alert-success");
    var error = $(".alert-danger");

    if (phoneNumber != 'error') {
      success.removeClass('hidden');
      if (!error.hasClass('hidden')) {
        error.addClass('hidden');
      }
    } else {
      error.removeClass('hidden');
      if (!success.hasClass('hidden')) {
        success.addClass('hidden');
      }
    }
  }

  $('form').submit(function(){
    /* AJAX JSON */
    if($("#JSON").prop("checked")){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../Mobile/Handler/',
        data: { phoneNumber: $('#phoneNumber').val() },
        success: function(data){
          phoneNumber = data.phoneNumber;
          showMessage();
        }
      });
    } else {
      /* AJAX XML */
      $.ajax({
        type: 'GET',
        dataType: 'xml',
        url: '../Mobile/Handler',
        data: { phoneNumber: $('#phoneNumber').val() },
        contentType: "text/xml",
        success: function(data){
          phoneNumber = $(data).find('phoneNumber').text();
          showMessage();
        }
      });
    }
    return false;
  });
});