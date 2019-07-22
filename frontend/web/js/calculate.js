$(document).ready(function() {

    $('#calculate').click(function(){

        let weight = parseFloat($('#weight').val());
        let height = parseFloat($('#height').val());
        let id =  $('#id').val();
        let email =  $('#email').val();
        let classification = '';
    
        if(weight > 0 && height > 0){
    
            let calculation = weight / (height*height);
            $('#BMI').val(calculation);
    
            if(calculation < 16)
                classification = 'Bajo peso - Delgadez severa';
            else if(calculation < 17)
                classification = 'Bajo peso - Delgadez moderna';
            else if(calculation < 18.5)
                classification = 'Bajo peso - Delgadez leve';
            else if(calculation < 25)
                classification = 'Normal';
            else if(calculation < 30)
                classification = 'Sobre peso - Preobeso';
            else if(calculation < 35)
                classification = 'Obesidad - Obesidad leve';
            else if(calculation < 40)
                classification = 'Obesidad - Obesidad media';
            else 
                classification = 'Obesidad - Obesidad mórbida';
            
            let date = new Date();
            let YYYY = date.getFullYear();
            let mm = date.getMonth();
            let dd = date.getDate();
            let HH = date.getHours();
            let MM = date.getMinutes();
            let SS = date.getSeconds();
            let dateFormat = `${YYYY}-${mm}-${dd} ${HH}:${MM}:${SS}`;
    
            let parametros = {
                "registration_date" : dateFormat,
                "weight" : weight,
                "height" : height,
                "BMI" : calculation,
                "id_user" : id,
                "classification" : classification,
                "email" : email
            };
    
            $.ajax({
                data:  parametros, 
                url:   './create',
                type:  'post', 
                success:  function (response) {
                    $("body > div.wrap > div.container > .site-index > .jumbotron > #calculate-form").prepend(response);
                },
                error: function(response){
                    console.log(response);
                }
            });
            
        }
    });
    
  });
