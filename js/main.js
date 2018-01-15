var selection = 0;
function RecuperationId (){

    var select = document.getElementById("choixvehicule" ).value;
    console.log(select);
    selection = select;

    $.ajax({
        data: 'select=' + select,
        url: 'recuperationvehicule.php',
        method: 'POST', // or GET
        success: function(msg) {
            console.log(msg);
        }
    });

}

