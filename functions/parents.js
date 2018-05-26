$(document).ready(function(){
  $('#4').addClass('disabled');
   $('#d4').addClass('grey-text');
  $('#mumForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/parents.php";
      //make ajax request
        $('#load3').html(`
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
        `);
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          $('#load3').html('');
          console.log(data);
          if(data == 'success')
          {
            $('#4').removeClass('disabled');
            $('#d4').removeClass('grey-text');
            $('#donemum').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#donemum').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }
            
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
  
  
  //for mum only
  $('#mumonly').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/parents.php";
    $('#load4').html(`
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
          $('#load4').html('');
          console.log(data);
          if(data == 'success')
          {
            $('#4').removeClass('disabled');
            $('#d4').removeClass('grey-text');
            $('#donemum1').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#donemum1').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }            
        }
      });
   
  });
  
    //for dad only
  $('#dadonly').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/parents.php";
      $('#load5').html(`
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
          console.log(data);
          $('#load5').html('');
          if(data == 'success')
          {
            $('#4').removeClass('disabled');
            $('#d4').removeClass('grey-text');
            $('#donedad1').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#donedad1').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }
        }
      });
   
  });
      //for guardian
  $('#guardianForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/parents.php";
      $('#load6').html(`
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
          $('#load6').html('');
          console.log(data);
          if(data == 'success')
          {
            $('#4').removeClass('disabled');
            $('#d4').removeClass('grey-text');
            $('#doneguardian').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#doneguardian').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }
        }
      });
   
  });
});