$(document).ready(function(){

    /*If signup button is clicked, redirect to signup page*/
    $("#signup_btn").click(function(){
        window.location.replace("../signup/index.php")
    });

    /*If go back button is clicked, redirect to home page */
    $("#home_btn").click(function(){
        window.location.replace("../index.php")
    });
    
    /*If sign in button is clicked, the email and password are verified through an AJAX Post request */
    $("#form").submit(function(e){

        e.preventDefault();

        var user = $("#inputEmail").val();
        var pass = $("#inputPassword").val();

        $.post("verification.php", {
                            email: user,
                            password: pass,
                                }, 
                            
                            function(data, status){
                                console.log(data);
                                    if(data == "Successfully signed in as admin!")
                                    {
                                        window.location.replace("../admin/index.php");
                                    }

                                    else if(data == "Success!")
                                    {
                                        window.location.replace("../index.php");
                                    }

                                    else if(data == "Error!")
                                    {
                                        alert("Error!");
                                    }

                                    else
                                    {
                                        alert("Wrong email or password.");
                                    }
                                }
                );
        });

});