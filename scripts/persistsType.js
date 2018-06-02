function validatefieldIsEmpty(field) {
  return (jQuery(field).val() != ""); 
}

function validateFieldsTypes(field) {
  return jQuery.isNumeric(jQuery(field).val()); 
}

function customizeFieldsError(message, fields) {
  jQuery("#alert").text(message);
  jQuery("#alert").show();

  fields.forEach(function(field){
    jQuery(field).css({"border-color":"#CACF5A", "color":"#717522", "background-color": "#FFFFC6"});
  });
}

jQuery(document).ready(function(event){
  
  jQuery("#alert").hide();

  jQuery("input[name=type-code]").blur(function(){
    var dados = jQuery(".form-type").serialize();
    jQuery.ajax(
      {
        type: "GET",
        url: "?controller=Type&action=validate",
        data: dados,
        success: function(data)
        {
          var occurrence = data; 

          if(data['occurrence'] > 0){
            customizeFieldsError("Código já cadastrado!" , ["input[name=type-code]"]);
            jQuery("button[name=save]").prop("disabled",true);
          }else{
            jQuery("#alert").hide();
            jQuery("button[name=save]").prop("disabled",false);
          }
        }
      }
    );
  });
});

function saveType() {
  var dados = jQuery(".form-type").serialize();
  console.log(dados);
  if(validatefieldIsEmpty("input[name=type-code]") && validatefieldIsEmpty("input[name=type-description]")){
    if(validateFieldsTypes("input[name=type-code]")){
      jQuery.ajax(
        {
          type: "POST",
          url: "?controller=Type&action=save",
          data: dados,
          success: function( data )
          {
            console.log(data);
            location.reload();
          }
        }
      );
    }else{
      customizeFieldsError("O campo 'Código' deve conter apenas números!" , ["input[name=type-code]"]);
    }
  }else{
    customizeFieldsError("O campo 'Código' e 'Descrição' devem ser preenchidos!" , ["input[name=type-code]","input[name=type-description]"]);
  }
  
}
