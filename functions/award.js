  $('#awardForm').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/award.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
            $('#doneawarded').html("Bursary Disbursed Successfully"); 
        }
      });
   
  });