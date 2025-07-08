//Mostrar Contraseña
jQuery('#clickme').on('click', function() {
    jQuery('#elpassword').attr('type', function(index, attr) {
      return attr == 'text' ? 'password' : 'text';
    })
})

