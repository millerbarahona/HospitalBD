$(document).ready(function() {

    $('#doc').on('change', function() {
        var id = $('#doc').val()
        $.ajax({
                type: 'POST',
                url: './getEspe.php',
                data: {
                    'id': id
                }
            })
            .done(function(listas_rep) {

                $('#espe').html(listas_rep)
            })
            .fail(function() {
                alert('Hubo un errror al cargar las especilidades')
            })
    })
    $("#fecha").on('change', function() {
        var id = $('#fecha').val()
        $.ajax({
                type: 'POST',
                url: 'getEspe.php',
                data: { 'dia': id }
            })
            .done(function(dia) {
                $("#hora").prop("type", "time");
            })
            .fail(function() {
                alert('Hubo un errror al cargar los vídeos')
            })
    })
    $("#cita").on("click", function() {
            let doctor = $("#doc").val()
            let espe = $("#espe").val()
            let dia_c = $("#fecha").val()
            let hora = $("#hora").val()
            let correo = $('#core').val()
            $.ajax({
                    type: 'POST',
                    url: 'getEspe.php',
                    data: { 'doc': doctor, 'espe': espe, 'dia_c': dia_c, 'hora': hora, 'core': correo }
                })
                .done(function(listas_rep) {
                    $('#pp').html(listas_rep)
                })
        }

    )
    $('#fecha').on('blur', function() {
        var id = $('#fecha').val()
        var doc = $('#doc').val()
        $.ajax({
                type: 'POST',
                url: './getEspe.php',
                data: {
                    'fecha': id,
                    'doc': doc
                }
            })
            .done(function(listas_rep) {
                $('#hora').html(listas_rep)
            })

    })

})