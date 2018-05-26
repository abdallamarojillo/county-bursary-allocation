$(document).ready(function(){

  $('#submitApplication').submit(function(e){
    e.preventDefault();
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/submitapplication.php";
    $('#load8').html(`
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
          $('#load8').html('');
          console.log(data);
            swal({   title: "Application Complete",   
            text: "You have successfully completed applying for your bursary. Please be patient while your bursary is being proccessed!",   
            type: "success",     
            confirmButtonColor: "teal",   
            confirmButtonText: "OK",    
            closeOnConfirm: true } , 
            function(isConfirm){   
                if (isConfirm) 
                    {   
                    //closeOnConfirm: true;
                    }     
            });
            //$('#submitted').html(data);
            //$('#success_message').fadeOut(10000);
            
        }
      });
   
  });
});