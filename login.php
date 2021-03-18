<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
      <title>Document</title>
   </head>
   <body>
      </div>
      <form  class="login-form" id="login_form" method="POST">
         <h1>Login</h1>
         <div  id="alert_action" role="alert"></div>
         <div class="form-input-material">
            <input type="text" name="username" id="username" placeholder=" " autocomplete="off" required class="form-control-material" />
            <label for="username">Username</label>
         </div>
         <div class="form-input-material">
            <input type="password" name="password" id="password" placeholder=" "  required class="form-control-material" />
            <label for="password">Password</label>
         </div>
         <input type="hidden" value="login" name="type">
         <button type="submit" class="btn btn-ghost">Login</button>
      </form>
      <script>
         $(document).on('submit', '#login_form', function(event){
           event.preventDefault();
           var form_data = $(this).serialize();
             $.ajax({
               url:"login_check.php",
               method:'POST',
               data:form_data,
               success:function(data){
                 var data = JSON.parse(data);
                 if(data.statusCode =="sucess"){
                   location.href = "index.php";
                 }
                 else if(data.statusCode =="fail"){
                   $("#alert_action").show();
                   $('#alert_action').html('<div class="alert alert-danger" style="width:150px;font-size:11px; text-align:center;" >'+'Invalid Credentials!'+'</div>');
                   setTimeout(function(){  
                         $('#alert_action').fadeOut("Slow");  
                    }, 2000);
                 }
               }
             }
             );
         
         });
      </script>
   </body>
</html>