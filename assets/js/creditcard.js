$(document).ready(function(){

  /**
   * Show success message
   */
  function showSuccessMessage() {
    var error = $(".alert-danger");
    $(".alert-success").removeClass('hidden');
    if(!error.hasClass('hidden')) {
      error.addClass('hidden');
    }
  }

  /**
   * Show error message
   */
   function showErrorMessage() {
    var success = $(".alert-success");
    $(".alert-danger").removeClass('hidden');
    if(!success.hasClass('hidden')) {
      success.addClass('hidden');
    }
    $("ul").empty();
   }

  $('form').submit(function(){
    /* AJAX JSON */
    if($("#JSON").prop("checked")){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../CreditCard/Handler/',
        data: { creditCardNumber: $('#creditCardNumber').val(),
                expirationDate: $('#expirationDate').val(),
                cvv2: $('#cvv2').val(),
                email: $('#email').val()
              },
        success: function(data){
          if(data.creditCardNumber != 'error' &&
               data.expirationDate != 'error' &&
                         data.cvv2 != 'error') {
            showSuccessMessage();
          } else {
            showErrorMessage();
            $.each( data, function( key, value ) {
              if(key == 'creditCardNumber' && value == 'error'){
                $('ul').append("<li>Incorrect Credit card number</li>");
              } else if (key == 'expirationDate' && value == 'error') {
                $('ul').append("<li>Incorrect Expiration date</li>");
              } else if (key == 'cvv2' && value == 'error') {
                $('ul').append("<li>Incorrect CVV2</li>");
              }
            });
          }
        }
      });
    } else {
      /* AJAX XML */
      $.ajax({
        type: 'GET',
        dataType: 'xml',
        url: '../CreditCard/Handler',
        data: {
                creditCardNumber: $('#creditCardNumber').val(),
                expirationDate: $('#expirationDate').val(),
                cvv2: $('#cvv2').val(),
                email: $('#email').val()
              },
        contentType: "text/xml",
        success: function(data){
          if($(data).find('creditCardNumber').text() != 'error' && 
               $(data).find('expirationDate').text() != 'error' && 
                         $(data).find('cvv2').text() != 'error') {
            showSuccessMessage();
          } else {
            showErrorMessage();
            var creditCard = {
              creditCardNumber: $(data).find('creditCardNumber').text(),
              expirationDate: $(data).find('expirationDate').text(),
              cvv2: $(data).find('cvv2').text()
            };
            $.each( creditCard, function( key, value ) {
              if(key == 'creditCardNumber' && value == 'error'){
                $('ul').append("<li>Incorrect Credit card number</li>");
              } else if (key == 'expirationDate' && value == 'error') {
                $('ul').append("<li>Incorrect Expiration date</li>");
              } else if (key == 'cvv2' && value == 'error') {
                $('ul').append("<li>Incorrect CVV2</li>");
              }
            });
          }
        }
      });
    }
    return false;
  });
});
