$(document).ready(function() {

   $('#ES').click(function(){

        let language = {"Language" : 'ES'};
        setLanguage(language);
    })

    $('#EN').click(function(){

        let language = {"Language" : 'EN'};
        setLanguage(language);
    })

    function setLanguage(language){
        $.ajax({
                    data:  language, 
                    url:   './set-language',
                    type:  'post', 
                    success:  function (response) {
                        location.reload();
                    },
                    error: function(response){
                        alert('Error!');
                    }
                });
    }

});