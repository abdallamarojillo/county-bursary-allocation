$(document).ready(function(){
   $('#2').addClass('disabled');
   $('#d2').addClass('grey-text');

  $('#personalForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/personalForm.php";
      //make ajax request
      $('#load').html(`
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
        `);
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
          $('#load').html('');
          if(data == 'success')
          {
            $('#2').removeClass('disabled');
            $('#d2').removeClass('grey-text');
            $('#done').html('<h4 class="green-text center">Information Saved Successfuly</h4>');
            
          }
          else
          {
            $('#done').html(data);
          }
            
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
});