
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

<body>
<div id="form">
  <div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
      <div id="userform">
        <ul class="nav nav-tabs nav-justified" role="tablist">
          <li class="active"><a href="#signup"  role="tab" data-toggle="tab">Sign up</a></li>
          <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="signup">
            <h2 class="text-uppercase text-center"> Sign Up </h2>
            <form id="signup" method="POST" action="register2.php">
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label>Name<span class="req">*</span> </label>
                    <input type="text" class="form-control" name="nama" id="nama" required data-validation-required-message="Please enter your name." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label><span class="req"></span> </label>
                   <select name="gender" id="gender" class="form-control" required data-validation-required-message="Please enter gender." autocomplete="off">
                     <option value="" selected hidden>Gender</option>
                     <option  class="form-select" value="Pria">Male</option>
                     <option class="form-select" value="Wanita">Female</option>
                   </select>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Your Phone<span class="req">*</span> </label>
                <input type="text" class="form-control" name="no" id="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label>Address<span class="req">*</span> </label>
                <input type="text" class="form-control" name="address" id="phone" required data-validation-required-message="Please enter your address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="mrgn-30-top">
                <button type="submit" class="btn btn-larger btn-block">
                  Sign up
                </button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade in" id="login">
            <h2 class="text-uppercase text-center"> Log in</h2>
            <form id="login" method="POST" action="login.php">
              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="mrgn-30-top">
                <button type="submit" class="btn btn-larger btn-block" name="user">
                Log in
                </button>
              </div>
              <div class="mrgn-30-top">
                <button type="submit" class="btn btn-larger btn-block" name="admin"> 
                Login as admin
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container --> 
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
