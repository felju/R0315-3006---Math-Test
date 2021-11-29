<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Welcome!</title>
      <link rel="stylesheet" href="style.css">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="outer-div-center">
      <div class="inner-div">
        <h1 style="text-align:center">Welcome to the Math Test</h1>
        <hr><br>
        <p>Hi there, nice to meet you. Look like you have to do some calculations. It's no big deal, take it easy and do your best. Some more information will follow later.<br><br>
        If you don't have an account yet, you can create one now. Otherwise, log in your existing account.</p><br>
        <h3>Login or create a new account</h3><br>
        <form action="login.php" method="post">
          <div>
            <div class="form-group row">
              <div class="col-sm-2">
                <input class="btn btn-primary button-no-hover" type="submit" value="Login">
              </div>
            </div>
          </div>
        </form><br>
        <form action="create-account-processing.php" method="post">
          <div>
            <div class="form-group row">
              <div class="col-sm-2">
                <input class="btn btn-primary button-no-hover" type="submit" value="Create Account">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
