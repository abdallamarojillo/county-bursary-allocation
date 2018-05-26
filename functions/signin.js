$(document).ready(function(){
  $('#signinForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "functions/signin.php";
    $('#load0').html(`
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
         $('#load0').html('');
          if (data=='success') {
           location.replace('home');
          }
          else
          {
            console.log(data);
            $("form").trigger("reset");
            $('#feedback_message').html(data);
          }

        }
      });
    
  });
});