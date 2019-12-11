$(document).ready(function(){

    /* when user chooses to add an employee */
    $('#addTrailModal').on('shown.bs.modal', function (event) 
    {
        $("#addThisTrail").unbind().click(function(){

                var form = $(this).parent().parent();

                var newlocation = form.parent().find(".locationInput").val();
                var newstartlocation = form.parent().find(".startLocationInput").val();
                var newendlocation = form.parent().find(".endLocationInput").val();
                var newdistance = form.find(".distanceInput").val();
                var newmeetingpoint = form.find(".meetingPointInput").val();
                var newmeetingtime = form.find(".meetingTimeInput").val();
                var newdate = form.find(".dateInput").val();
                var newdifficulty = form.find(".difficultyInput").val();
                var newprice = form.find(".priceInput").val();
                var newtransportationprice = form.find(".transportationInput").val();
                var newtransportationphone = form.find(".transportationPhoneInput").val();

               $.post("add.php", {
                    location: newlocation,
                    distance: newdistance,
                    startlocation: newstartlocation,
                    endlocation: newendlocation,
                    meetingpoint: newmeetingpoint,
                    meetingtime: newmeetingtime,
                    date: newdate,
                    difficulty: newdifficulty,
                    price: newprice,
                    transportationprice: newtransportationprice,
                    transportationphone: newtransportationphone
                       }, 
                   
                   function(data, status){
                       console.log(data);
                           alert(data);

                           if(data == "Success!")
                           {
                                var str = "<tr><td><span class=\"custom-checkbox\"><input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\"><label for=\"checkbox1\"></label></span></td><td class=\"location\">" + newlocation + "</td><td class=\"distance\">" + newdistance + "</td><td class=\"meeting_point\">" + newmeetingpoint + "</td><td class=\"difficulty\">" + newdifficulty + "</td><td class=\"price\">" + newprice + "</td><td><a href=\"#\" class=\"edit\" data-toggle=\"modal\" data-target=\"#editTrailModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a><a href=\"#\" class=\"delete\" data-toggle=\"modal\" data-target=\"#deleteTrailModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a></td></tr>";
                                $("tbody").prepend(str);
                           }
                       }
               );
            
               $('#addTrailModal').modal('toggle');
       });
    });

     /* when user chooses to delete selected entries */
     $('#deleteTrailsModal').on('shown.bs.modal', function (event) 
     {
         $("#deleteSelectedTrails").unbind().click(function(){
            $("input:checked").each(function() {
                var locationn = $(this).parent().parent().parent().find(".location").html();
    
                $.post("delete.php", {
                    location: locationn
                        }, 
                    
                    function(data, status){
                        console.log(data);
                            if(data == "success")
                            {
                                alert("Successfully deleted!");
                            }
                        }
                );
    
                $(this).parent().parent().parent().remove();
                $('#deleteTrailsModal').modal('toggle');
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