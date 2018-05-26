$(document).ready(function(){
  $('#staffsigninForm').submit(function(e){
    e.preventDefault();
          var ourData = $(this).serializeArray();
          var TargetUrl = "functions/staffsignin.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
       
          if (data=='success') {
           location.replace('admin');
          }
          else
          {
            console.log(data);
            $("form").trigger("reset");
            $('#feedback_message1').html(data);
          }

        }
      });
    
  });
});