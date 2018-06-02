
var sumValue = 0;
var sumTax = 0;

function validatefieldIsEmpty(field) {
  return (jQuery(field).val() != ""); 
}

function validateFieldsTypes(field) {
  return jQuery.isNumeric(jQuery(field).val()); 
}

function customizeFieldsError(message, field) {
  jQuery("#alert").text(message);
  jQuery("#alert").show();

  jQuery(field).css({"border-color":"#CACF5A", "color":"#717522", "background-color": "#FFFFC6"});                  
}

function customizeFielSuccess(field) {
  jQuery(field).css({"border-color":"#00C600", "color":"#008400", "background-color": "#E6FFE6"});  
}

function customizeFieldsReset() {
  $("input[name=product]").removeAttr('style');
  $("#input-count").removeAttr('style');
  $("#input-product-code").removeAttr('style');
}
jQuery(document).ready(function(event){
  
    jQuery("#alert").hide();
    
    jQuery("#input-product-code").blur(function(){
      
      jQuery("#alert").hide();
      
      if(validatefieldIsEmpty("#input-product-code")){
        
        jQuery("#input-product-code").css({"border-color":"#CACF5A", "color":"#717522", "background-color": "#FFFFC6"});

        if(validateFieldsTypes("#input-product-code")){
          
          var dados = $('.form-cash-system').serialize();    
          
          jQuery.ajax(
            {
              type: "GET",
              url: "?controller=CashSystem&action=findProduct",
              data: dados,
              success: function(data)
              {
                if(!data){
                  customizeFieldsError("Produto não enconrado para o código informado!", "input[name=product]");
                }
                else {
                  customizeFielSuccess("#input-product");
                  jQuery("input[name=product]").val(data);
                }
              }
            }
          );
        }else{
          customizeFieldsError("O campo 'Código do Produto' deve conter apenas números!", "#input-product-code");
        }
      }else{
        customizeFieldsError("O campo 'Código do Produto' deve ser informado!", "#input-product-code");
      }
    });

    jQuery("#add-product").click(function(event){

      event.preventDefault();

      if(validatefieldIsEmpty("#input-count")){

        jQuery("#input-count").css({"border-color":"#CACF5A", "color":"#717522", "background-color": "#FFFFC6"});
        
        if(validateFieldsTypes("#input-count")){
          
          jQuery("#alert").hide();
          
          customizeFieldsReset();
          
          var dados = $('.form-cash-system').serialize();
          jQuery.ajax(
            {
              type: "GET",
              url: "?controller=CashSystem&action=process",
              data: dados,
              success: function(data){
    
                sumValue += data['prodructValue'];
                sumTax += data['productTax'];
    
                jQuery('strong[name=sum-value]').text("R$ " + sumValue);
                jQuery('strong[name=sum-tax]').text("R$ " + sumValue);
    
                jQuery("#table-releases").find('tbody')
                  .append($('<tr>')
                    .append($('<td>').text(data['prodructDescription']))
                    .append($('<td>').text(data['prodructValue']))
                    .append($('<td>').text(data['productTax']))
                  );
    
                jQuery("#input-product-code").val("");
                jQuery('#input-product').val("");
                jQuery('#input-count').val("");
              }
            }
          );
        }else{
          customizeFieldsError("O campo 'Quantidade' deve conter apenas números!", "#input-count");
        } 
      }else{
        customizeFieldsError("O campo 'Quantidade' deve ser informado!", "#input-count");
      }
    });
});
