$(document).ready(function(){
  $('#3').addClass('disabled');
  $('#d3').addClass('grey-text');
  $('#educationForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/education.php";
      //make ajax request
         $('#load1').html(`
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
        `);
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          $('#load1').html('');
          if(data == 'success')
          {
            $('#3').removeClass('disabled');
            $('#d3').removeClass('grey-text');
            $('#done1').html('<h4 class="green-text center">Information Saved Successfully</h4>');
          }
          else
          {
            $('#done1').html('<h4 class="red-text center">An error occured. Please try again</h4>');
          }
            
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
  
    $('#academicForm').submit(function(e){
    e.preventDefault();

   var formData = new FormData($(this)[0]);
      $('#load2').html(`
                  <div class="progress">
                      <div class="indeterminate"></div>
                  </div>
        `);
   $.ajax({
      url:'../functions/perfomance.php',
      type : "POST",
      data : formData,
      cache: false,
      contentType : false,
      processData:false,
      async:false,
      success:function(response){
        $('#load2').html('');
        if(response == 'success')
        {
          console.log(response);
           $('#3').removeClass('disabled');
           $('#d3').removeClass('grey-text');
            $('#response').html('<h4 class="green-text center">Information Saved Successfully</h4>');
        }
        else if(response == 'extension')
        {
          $('#response').html('<h4 class="red-text center"> Only image and pdf files allowed</h4>');
          console.log(response);
        }
      }
   });
   return false;
  });
});