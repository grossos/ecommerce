$(document).ready(function(){
   

    $('#check').click(function() {
        if ($('#password').attr('type') == 'text') {
        $('#password').attr('type', 'password');
        } else {
        $('#password').attr('type', 'text');
        }
    });

    var current = $("#total").val();
    //console.log(current);
    if(current > 0){
        $('#order').show();
    }
    else $('#order').hide();
    
    // var info = document.getElementById("info");
    // $('#order').on('click', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type: "GET",
    //         url: 'cart.php',
    //         data: $(this).serialize(),
    //         success: function(response)
    //         {
    //         info.innerHTML = "Your order is completed";
    //         $('#order').hide()
    //         }
    //     });
    // });
});
