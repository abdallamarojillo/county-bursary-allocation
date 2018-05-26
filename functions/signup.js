$(document).ready(function(){

  $('#signupForm').submit(function(e){
    e.preventDefault();
    
    var Password = $('#password').val();
    var ConfirmPassword = $('#password1').val();
    
    if (Password.length < 6 || ConfirmPassword.length < 6) {
        $('#error_password').addClass("red-text center").html('Password should be more than 6 characters');
        $('#password').focus();
    }
    else
    if (Password != ConfirmPassword) {
        $('#error_password').addClass("red-text center").html('Your passwords do not match');
        $('#password').focus();
    }
    else
    {
      $('#error_password').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "functions/signup.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
            //$("form").trigger("reset");
            if (data == 'emailExists') {
                 $('#error_email').addClass("red-text center").html("email in use");
            }
            else
            {
               $('#success_message').html("Successfully Registered. You can now log in");
            }
           
            //$('#success_message').fadeOut(10000);
            
        }
      });
    }
    
  });
});