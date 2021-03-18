<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/register-style.css">
  <title>Register Demo</title>
</head>
<body>
  <div  id="alert_action" role="alert"></div>
    <form class="form" id="register_form">
      <h1>Sign Up</h1>
      
      <div class="form-group">
        <input type="text" placeholder=" " id="username" required name="username">
        <label for="username">UserName</label>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Error encountered!
        </div>
      </div>
      <div class="form-group">
        <input type="email" placeholder=" " id="email" required name="email">
        <label for="email">Email</label>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
        </div>

      </div>

      <div class="form-group">
        <input type="password" placeholder=" " id="password" required name="password">
        <label for="password">Password</label>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
        </div>
      </div>
      <div class="form-group">
        <input type="password" placeholder=" " id="confirm" required>
        <label for="confirm">Confirm</label>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
        </div>
        <span id ="message">
        </span>
      </div>
     
      <input type="hidden" value="register" name="type">
      <input type="submit" value="Sign Up">
      <div class="form-bottom">
        <a href="#">Forgot Password?</a>
      </div>
    </form>
  
    <script>
      $(document).on('submit', '#register_form', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
          $.ajax({
            url:"login_check.php",
            method:'POST',
            data:form_data,
            success:function(data){
              var data = JSON.parse(data);
              if(data.statusCode =="sucess"){
                location.href = "login.php";
              }
              else if(data.statusCode =="already_exists"){
                $("#alert_action").show();
                $('#alert_action').html('<div style="width: 100%; text-align:center;">'+'Invalid EmailId or Password !'+'</div>');
                setTimeout(function(){  
                      $('#alert_action').fadeOut("Slow");  
                 }, 2000);
              }
            }
          }
          );
      
      });
    </script>
      <script>

        $('#confirm').on('keyup', function() {
              if ($('#password').val() == $('#confirm').val()) {
                $('#message').html('Password is Matching').css('color', 'green');
              }
              else
                $('#message').html('Password is Not Matching').css('color', 'red');
            });
          </script>
</body>
</html>