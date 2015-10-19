<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Credit card / Payment API</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Credit card</h1>
        <form>
          <div class="form-group">
            <!-- Credit card number -->
            <label for="creditCardNumber">Credit card number *</label>
            <input type="number" required class="form-control" id="creditCardNumber" placeholder="XXXXXXXXXXXXXXXX" value="4485152312641256">
          </div>
          <div class="form-group">
            <!-- Expiration date -->
            <label for="expirationDate">Expiration date *</label>
            <input type="month" required class="form-control" id="expirationDate" value="2016-07">
          </div>
          <div class="form-group">
            <!-- CVV2 -->
            <label for="cvv2">CVV2 *</label>
            <input type="number" required class="form-control" id="cvv2" placeholder="XXX" value="733">
          </div>
          <div class="form-group">
            <!-- Email address -->
            <label for="email">Email address *</label>
            <input type="email" required class="form-control" id="email" placeholder="Email" value="example@email.com">
          </div>
          <h5>* Indicates required field.</h5>
          <!-- JSON/XML checkbox -->
          <div class="radio">
            <label>
              <input type="radio" name="typeRequest" id="JSON" value="JSON" checked>
              JSON
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="typeRequest" id="XML" value="XML">
              XML
            </label>
          </div>
          <!-- Error message -->
          <div class="alert alert-danger hidden" role="alert">
            ERROR:
            <ul></ul>
          </div>
          <!-- Success message -->
          <div class="alert alert-success hidden" role="alert">Success</div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Main -->
    <script src="../assets/js/creditcard.js"></script>
  </body>
</html>