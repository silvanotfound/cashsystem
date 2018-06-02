function saveProduct() {
  var dados = jQuery('.form-product').serialize();
  console.log(dados);
  var value_format = jQuery("input[name=product-value]").val();
  jQuery("input[name=product-value]").val(value_format.replace(",","."));
  
  console.log(jQuery("input[name=product-value]").val());

  jQuery.ajax(
    {
      type: "POST",
      url: "?controller=Product&action=save",
      data: dados,
      success: function( data )
      {
        console.log(data);
        location.reload();
      }
    }
  );
}
