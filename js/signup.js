$(document).ready(function(){

    /*Three flags that need to be true for the Sign Up submit button to be enabled*/
    var meetsreq1 = false; 
    var meetsreq2 = false;
    var meetsreq3 = false;

    /*Makes the password requirements appear as a popover when user clicks on the password input field*/
    $('#inputPassword').popover({title:'Password requirements' ,placement:'right'}).blur(function () {
        $(this).popover('hide')});

    /*Makes sure the email and password are in the correct format*/
    $(".specificFormat").keyup(function(){
        var user = $("#inputEmail").val();
        var pass = $("#inputPassword").val();

        $.post("../signup/formatcheck.php", {
                                    email: user,
                                    password : pass,
                                    },
                                    
                                    function(data, status){
                                        if(data == "success")
                                        {
                                            meetsreq1 = true;
                                        }

                                        else
                                        {
                                            meetsreq1 = false;
                                        }

                                        if(meetsreq1 && meetsreq2 && meetsreq3)
                                            $("#signup_btn").removeAttr("disabled");

                                        else
                                            $("#signup_btn").attr("disabled", true);
                                    }
                                    )
    });

    /*Makes sure the two password fields match*/
    $("#inputPassword2").keyup(function(){
        var pass = $("#inputPassword").val();
        var pass2 = $("#inputPassword2").val();

        $.post("../signup/matching-passwords.php", {
                                    password: pass,
                                    password2 : pass2,
                                    },
                                    
                                    function(data, status){
                                        if(data == "true")
                                        {
                                            meetsreq2 = true;
                                            $(".alert").attr("hidden", true);
                                        }

                                        else
                                        {
                                            meetsreq2 = false;
                                            $(".alert").removeAttr("hidden");
                                        }

                                        if(meetsreq1 && meetsreq2 && meetsreq3)
                                                $("#signup_btn").removeAttr("disabled");

                                        else
                                            $("#signup_btn").attr("disabled", true);
                                    }
                                    )
    });

    /*Makes sure the First Name field is not empty*/
    $("#inputName").keyup(function(){
        var name = $(this).val();
        var last = $("#inputLast").val();

        if(name == "" || last == "")
            meetsreq3 = false;

        else
            meetsreq3 = true;

        if(meetsreq1 && meetsreq2 && meetsreq3)
        $("#signup_btn").removeAttr("disabled");

        else
            $("#signup_btn").attr("disabled", true);
    })

    /*Makes sure the Last Name field is not empty*/
    $("#inputLast").keyup(function(){
        var name = $(this).val();
        var last = $("#inputLast").val();

        if(name == "" || last == "")
            meetsreq3 = false;

        else
            meetsreq3 = true;

        if(meetsreq1 && meetsreq2 && meetsreq3)
            $("#signup_btn").removeAttr("disabled");

        else
            $("#signup_btn").attr("disabled", true);
    })

});
