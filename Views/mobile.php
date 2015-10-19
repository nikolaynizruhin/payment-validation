<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mobile / Payment API</title>

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
        <h1>Mobile</h1>
        <form>
          <div class="form-group">
            <!-- Phone number -->
            <label for="phoneNumber">Phone number *</label>
            <input type="number" required class="form-control" id="phoneNumber" placeholder="380XXXXXXXXX" value="380631234567">
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
          <div class="alert alert-danger hidden" role="alert">ERROR: Incorrect phone number</div>
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
    <script src="../assets/js/mobile.js"></script>
  </body>
</html>