$(document).ready(function(){
    //$('#5').addClass('disabled');
    $('#academicForm').submit(function(e){
    e.preventDefault();

   var formData = new FormData($(this)[0]);
   $.ajax({
      url:'../functions/perfomance.php',
      type : "POST",
      data : formData,
      dataType:'json',
      cache: false,
      contentType : false,
      processData:false,
      async:false,
      success:function(response){
            $('#response').html("file uploaded");

            $('#5').removeClass('disabled');
          
         
      }
   });
   return false;
  });
});