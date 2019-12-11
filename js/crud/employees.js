$(document).ready(function(){

      /* when user chooses to add an employee */
      $('#addEmployeeModal').on('shown.bs.modal', function (event) 
      {
          $("#addThisEmployee").unbind().click(function(){
  
                  var form = $(this).parent().parent();
  
                  var newfirst = form.parent().find(".firstInput").val();
                  var newlast = form.find(".lastInput").val();
                  var newposition = form.find(".positionInput").val();
                  var newemail = form.find(".emailInput").val();
                  var newaddress = form.find(".addressInput").val();
                  var newphonenum = form.find(".phoneInput").val();
                  var newsalary = form.find(".salaryInput").val();
  
                 $.post("add.php", {
                      first: newfirst,
                      last: newlast,
                      position: newposition,
                      email: newemail,
                      address: newaddress,
                      phone: newphonenum,
                      salary: newsalary
                         }, 
                     
                     function(data, status){
                         console.log(data);
                             alert(data);

                            if(data == "Success!")
                           {
                                var str = "<tr><td><span class=\"custom-checkbox\"><input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\"><label for=\"checkbox1\"></label></span></td><td class=\"name\">"+newfirst+ " " + newlast + "</td><td class=\"position\">"+newposition+"</td><td class=\"email\">"+newemail+"</td><td class=\"address\">"+newaddress+"</td><td class=\"phone\">"+newphonenum+"</td><td class=\"salary\">"+newsalary+"</td><td><a href=\"#\" class=\"edit\" data-toggle=\"modal\" data-target=\"#editEmployeeModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a><a href=\"#\" class=\"delete\" data-toggle=\"modal\" data-target=\"#deleteEmployeeModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a></td></tr>"
                                $("tbody").prepend(str);
                           }
                         }
                 );
              
                 $('#addEmployeeModal').modal('toggle');
         });
      });
  
       /* when user chooses to delete selected entries */
       $('#deleteEmployeesModal').on('shown.bs.modal', function (event) 
       {
           $("#deleteSelectedEmployees").unbind().click(function(){
              $("input:checked").each(function() {
                  var emailaddress = $(this).parent().parent().parent().find(".email").html();
      
                  $.post("delete.php", {
                      email: emailaddress
                          }, 
                      
                      function(data, status){
                          console.log(data);
                              if(data == "success")
                              {
                                  alert("Successfully deleted!");
                              }
      
                              else if(data == "falseemail")
                              {
                                  alert("No email with this bla bla");
                              }
      
                              else 
                              {
                                  alert("error");
                              }
                          }
                  );
      
                  $(this).parent().parent().parent().remove();
                  $('#deleteEmployeesModal').modal('toggle');
              });
          });
       });
  
      /* when user chooses to delete a single entry from the table */
      $('#deleteEmployeeModal').on('shown.bs.modal', function (event) 
      {
          var triggerElement = $(event.relatedTarget); // Button that triggered the modal
          var emailaddress = triggerElement.parent().parent().find(".email").html();
  
          $("#deleteThisEmployee").unbind().click(function(){
              $.post("delete.php", {
                  email: emailaddress
                   },
                   function(data, status){
                       console.log(data);
                       if(data == "success")
                       {
                           alert("Successfully deleted!");
                       }
      
                       else if(data == "falseemail")
                       {
                           alert("No email with this bla bla");
                       }
      
                       else 
                       {
                           alert("error");
                       }
                   }
              );
  
              triggerElement.parent().parent().remove();
              $('#deleteEmployeeModal').modal('toggle');
          });
      });
  
      /* when user chooses to edit a single entry from the table */
      $('#editEmployeeModal').on('shown.bs.modal', function (event) 
      {
          var triggerElement = $(event.relatedTarget); // Button that triggered the modal
          var row = triggerElement.parent().parent();
  
          var name = row.find(".name").html().split(" ");
          var position = row.find(".position").html();
          var emailaddress = row.find(".email").html();
          var addr = row.find(".address").html();
          var phonenum = row.find(".phone").html();
          var salary = row.find(".salary").html();
  
          $(this).find(".firstInput").attr('value', name[0]);
          $(this).find(".lastInput").attr('value', name[1]);
          $(this).find(".positionInput").attr('value', position);
          $(this).find(".emailInput").attr('value', emailaddress);
          $(this).find(".addressInput").attr('value', addr);
          $(this).find(".phoneInput").attr('value', phonenum);
          $(this).find(".salaryInput").attr('value', salary);
          
  
          $("#editThisEmployee").unbind().click(function(){
              var modal = $(this).parent().parent();
              var newfirst = modal.parent().find(".firstInput").val();
              var newlast = modal.find(".lastInput").val();
              var newposition = modal.find(".positionInput").val();
              var newemail = modal.find(".emailInput").val();
              var newaddress = modal.find(".addressInput").val();
              var newphonenum = modal.find(".phoneInput").val();
              var newsalary = modal.find(".salaryInput").val();
  
              $.post("edit.php", {
                  oldemail: emailaddress,
                  first: newfirst,
                  last: newlast,
                  position: newposition,
                  email: newemail,
                  address: newaddress,
                  phone: newphonenum,
                  salary: newsalary
                   },
  
                   function(data, status){
                       console.log(data);
                       if(data == "success")
                       {
                           alert("Successfully changed!");
                       }
  
                       else 
                       {
                           alert("error");
                       }
                   }
              );
  
              row.find(".name").html(newfirst+" "+newlast);
              row.find(".position").html(newposition);
              row.find(".email").html(newemail);
              row.find(".address").html(newaddress);
              row.find(".phone").html(newphonenum);
              row.find(".salary").html(newsalary);
              $('#editEmployeeModal').modal('toggle');
          });
      });
      
})