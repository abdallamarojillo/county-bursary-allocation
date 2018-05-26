$(document).ready(function(){

  $('#amountForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/addAmount.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
            $('#doneamount').html(data);
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
});