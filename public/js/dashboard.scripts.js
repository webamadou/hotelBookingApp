global.$ = global.jQuery = require('jquery');

$(document).ready(function(){
   $('#price_type').change(function (e) {
       let value = $(this).val();
       if (value <= 0){
           $('#regular_price_type').show();
           $('#dynamic_price_type').hide();
       } else {
           $('#dynamic_price_type').show();
           $('#regular_price_type').hide();
       }
   })
});
