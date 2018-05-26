$(document).ready(function(){
  $('#5').addClass('disabled');
  $('#d5').addClass('grey-text');
  $('#accountForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/account.php";
    $('#load7').html(`
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
        `);
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
        $('#load7').html('');
          console.log(data);
          if(data == 'success')
          {
              $('#5').removeClass('disabled');
              $('#d5').removeClass('grey-text');
            $('#doneaccount').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#doneaccount').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }
            
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
});