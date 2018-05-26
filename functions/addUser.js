$(document).ready(function(){

  $('#adduserform').submit(function(e){
    e.preventDefault();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
 
    if(password != cpassword)
    {
        $('#error_empty3').html('');
        $('#error_empty3').html('<h5 class="red-text"><i class="material-icons">warning</i>Your passwords do not match</h5>');
    }
    else
    {
      $('#error_empty3').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/adduser.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
            //$("form").trigger("reset");
           $('#success_message3').html(data);
                setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
           
        }
      });
    }
    
  });
});