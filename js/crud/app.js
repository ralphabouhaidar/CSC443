$(document).ready(function(){

    /*Reservations per customer chart*/
    $.ajax({
        url: "../admin/chartdata/fetchcustomers.php",
        method: "GET",
        dataType: "json",
        success: function(data){
            console.log(data);
             var id = [];
             var reservations = [];

             for(var i = 0; i < data.length; i++)
             {
                id.push(data[i].customer_id);
                reservations.push(data[i]["COUNT(r.reservation_id)"]);
             }

             var chartdata = {
                 labels: id,
                 datasets: [
                            {
                                label: "Reservations",
                                backgroundColor: "rgba(0, 100, 300, 0.75)",
                                borderColor: "rgba(200, 200, 200, 0.75)",
                                hoverBackgroundColor: "rgba(200, 200, 200, 1)",
                                hoverBorderColor: "rgba(200, 200, 200, 1)",
                                data: reservations
                            }
                             ]
             }

             var ctx = $("#mycanvas2");
             var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                stepSize: 1,
                                suggestedMin: 0,
                                suggestedMax: 5
                            }
                        }]
                    }
                }

             });
        },
        error: function(data){
            console.log(data);
        }
    });

    /* Salaries per employee chart */
    $.ajax({
        url: "../admin/chartdata/fetchemployees.php",
        method: "GET",
        dataType: "json",
        success: function(data){
            console.log(data);
             var name = [];
             var salary = [];

             for(var i = 0; i < data.length; i++)
             {
                name.push(data[i].emp_first + " " + data[i].emp_last);
                salary.push(data[i].Salaries);
             }

             var chartdata = {
                 labels: name,
                 datasets: [
                            {
                                label: "Salary",
                                backgroundColor: "rgba(0, 300, 100, 0.75)",
                                borderColor: "rgba(200, 200, 200, 0.75)",
                                hoverBackgroundColor: "rgba(200, 200, 200, 1)",
                                hoverBorderColor: "rgba(200, 200, 200, 1)",
                                data: salary
                            }
                             ]
             }

             var ctx = $("#mycanvas1");
             var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                stepSize: 200000,
                                suggestedMin: 0,
                                suggestedMax: 3000000
                            }
                        }]
                    }
                }

             });
        },
        error: function(data){
            console.log(data);
        }
    });
});