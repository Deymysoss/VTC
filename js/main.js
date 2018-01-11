
function RecuperationId (){

    var select = document.getElementById("choixvehicule" ).value;
    console.log(select);

    $.ajax({
        data: 'select=' + select,
        url: 'recuperationvehicule.php',
        method: 'POST', // or GET
        success: function(msg) {
            alert(msg);
        }
    });
}


