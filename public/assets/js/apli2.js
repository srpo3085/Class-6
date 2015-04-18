var fb = {
    comentar: function(id) {
        var comentario = $("#comentario-" + id);
        if (comentario.val() != '') {
            $.ajax({
                url: 'publicacion/comentario',
                type: 'POST',
                async: true,
                data: {
                        usuario:1,
                        comentario:comentario.val()
                        },
                success: function(response){
                    alert("Se ejecuto correctamente");
                }
                //error: muestraError
            });
        } else {
            alert('Este campo es obligatorio');
        }
    }
};
