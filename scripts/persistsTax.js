function saveTax() {
  var dados = jQuery('.form-tax').serialize();
  
  jQuery.ajax(
    {
      type: "POST",
      url: "?controller=Tax&action=save",
      data: dados,
      success: function( data )
      {
        console.log(data);
        location.reload();
      }
    }
  );
}
