function showContent() {
    element = document.getElementById("form1");
    element1 = document.getElementById("form2");
    element2 = document.getElementById("form3")
    check = document.getElementById("tab-1");
    check1 = document.getElementById("tab-2");
    boton = document.getElementById("tab-3");
    if (check.checked) {
        element.style.display = 'block';
        element1.style.display = 'none';
        element2.style.display = 'none';
    }
    if (check1.checked) {
        element.style.display = 'none';
        element1.style.display = 'block';
        element2.style.display = 'none';
    }
    if (boton.checked) {
        element.style.display = 'none';
        element1.style.display = 'none';
        element2.style.display = 'block';
    }
}

function mostrarAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
    })
}

function consulta() {
    $.ajax({
        url: 'vali.php',
        type: POST,
        success: function(res) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        }
    })
}
$('#actu').click(function() {
    consulta();
})