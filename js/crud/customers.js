$(document).ready(function(){

    /* when user chooses to add an employee */
    $('#addCustomerModal').on('shown.bs.modal', function (event) 
    {
        $("#addThisCustomer").unbind().click(function(){

                var form = $(this).parent().parent();

                var newfirst = form.parent().find(".firstInput").val();
                var newlast = form.find(".lastInput").val();
                var newemail = form.find(".emailInput").val();
                var newaddress = form.find(".addressInput").val();
                var newphonenum = form.find(".phoneInput").val();

               $.post("add.php", {
                    first: newfirst,
                    last: newlast,
                    email: newemail,
                    address: newaddress,
                    phone: newphonenum,
                       }, 
                   
                   function(data, status){
                       console.log(data);
                           alert(data);

                           if(data == "Success!")
                           {
                            var str = "<tr><td><span class=\"custom-checkbox\"><input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\"><label for=\"checkbox1\"></label></span> </td><td class=\"name\">"+newfirst + " " + newlast+ "</td><td class=\"email\">"+newemail+"</td><td class=\"address\">"+newaddress+"</td><td class=\"phone\">"+newphonenum+"</td><td><a href=\"#\" class=\"edit\" data-toggle=\"modal\" data-target=\"#editEmployeeModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a><a href=\"#\" class=\"delete\" data-toggle=\"modal\" data-target=\"#deleteEmployeeModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a></td></tr>";
                            $("tbody").prepend(str);
                           }
                       }
               );
            
               $('#addCustomerModal').modal('toggle');
       });
    });

     /* when user chooses to delete selected entries */
     $('#deleteCustomersModal').on('shown.bs.modal', function (event) 
     {
         $("#deleteSelectedCustomers").unbind().click(function(){
            $("input:checked").each(function() {
                var emailaddress = $(this).parent().parent().parent().find(".email").html();
    
                $.post("delete.php", {
                    email: emailaddress
                        }, 
                    
                    function(data, status){
                        console.log(data);
                            if(data == "Success!")
                            {
                                alert("Successfully deleted!");
                            }
    
                            else if(data == "falseemail")
                            {
                                alert("No customer with this email.");
                            }
    
                            else 
                            {
                                alert("error");
                            }
                        }
                );
    
                $(this).parent().parent().parent().remove();
                $('#deleteCustomersModal').modal('toggle');
            });
        });
     });

    /* when user chooses to delete a single entry from the table */
    $('#deleteCustomerModal').on('shown.bs.modal', function (event) 
    {
        var triggerElement = $(event.relatedTarget); // Button that triggered the modal
        var emailaddress = triggerElement.parent().parent().find(".email").html();

        $("#deleteThisCustomer").unbind().click(function(){
            $.post("delete.php", {
                email: emailaddress
                 },
                 function(data, status){
                     console.log(data);
                     if(data == "Success!")
                     {
                         alert("Successfully deleted!");
                     }
    
                     else if(data == "falseemail")
                     {
                         alert("No customer with this email");
                     }
    
                     else 
                     {
                         alert("error");
                     }
                 }
            );

            triggerElement.parent().parent().remove();
            $('#deleteCustomerModal').modal('toggle');
        });
    });

    /* when user chooses to edit a single entry from the table */
    $('#editCustomerModal').on('shown.bs.modal', function (event) 
    {
        var triggerElement = $(event.relatedTarget); // Button that triggered the modal
        var row = triggerElement.parent().parent();

        var name = row.find(".name").html().split(" ");
        var emailaddress = row.find(".email").html();
        var addr = row.find(".address").html();
        var phonenum = row.find(".phone").html();

        $(this).find(".firstInput").attr('value', name[0]);
        $(this).find(".lastInput").attr('value', name[1]);
        $(this).find(".emailInput").attr('value', emailaddress);
        $(this).find(".addressInput").attr('value', addr);
        $(this).find(".phoneInput").attr('value', phonenum);
        

        $("#editThisCustomer").unbind().click(function(){
            var modal = $(this).parent().parent();
            var newfirst = modal.parent().find(".firstInput").val();
            var newlast = modal.find(".lastInput").val();
            var newemail = modal.find(".emailInput").val();
            var newaddress = modal.find(".addressInput").val();
            var newphonenum = modal.find(".phoneInput").val();

            $.post("edit.php", {
                oldemail: emailaddress,
                first: newfirst,
                last: newlast,
                email: newemail,
                address: newaddress,
                phone: newphonenum,
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
            row.find(".email").html(newemail);
            row.find(".address").html(newaddress);
            row.find(".phone").html(newphonenum);
            $('#editCustomerModal').modal('toggle');
        });
    });
    
})