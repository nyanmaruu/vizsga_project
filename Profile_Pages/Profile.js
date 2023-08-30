$(document).ready(function(){
    var firstName = $('#firstName').text();
    var lastName = $('#lastName').text();
    var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
    var profileImage = $('#profileImage').text(intials);
    addressUpdate();
  });
// insert form to profile page
  function addressUpdate()
  {
     
      $.ajax({
          url: "../Action.php",
          type: "POST",
          data: {
              action: "profileUpdate",
          },
          
          success: function(response){
              $("#addressForm").html(response);
             
          }
      })
  }   
  
 
