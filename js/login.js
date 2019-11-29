$(document).ready(function(){

    /*If signup button is clicked, redirect to signup page*/
    $("#signup_btn").click(function(){
        window.location.replace("../signup/signup.html")
    })
    
    /*If sign in button is clicked, the email and password are verified through an AJAX Post request */
    $("#signin_btn").click(function(){

        var user = $("#inputEmail").val();
        var pass = $("#inputPassword").val();

        $.post("verification.php", {
                            email: user,
                            password: pass,
                                }, 
                            
                            function(data, status){
                                console.log(data);
                                    if(data == "falsepass")
                                    {
                                        alert("Wrong password");
                                    }

                                    else if(data == "falseemail")
                                    {
                                        alert("No email with this bla bla");
                                    }

                                    else if(data == "true")
                                    {
                                        alert("Sucess!");
                                    }

                                    else
                                    {
                                        alert("error");
                                    }
                                }
                );
        });

});