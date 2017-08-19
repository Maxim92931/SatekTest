
$("document").ready(function () {

    $("#signup").submit(function (e){
        e.preventDefault();

        $.ajax({
            url: 'reg',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                if (response === '1') {
                    window.location = '/';
                }
            }
        })
    });
    
    $('#signin').submit(function (e) {
        e.preventDefault();

       $.ajax({
           url: '',
           type: 'POST',
           data: $(this).serialize(),
           success: function (responce) {
               if (responce === '') {
                   window.location = 'scraps';
               } else {
                   console.log(responce);
               }
           }
       })
    });
    
    $('#inputEmail3').change(function () {
        $.ajax({
            url: 'reg',
            type: 'POST',
            data: {
                'action' : 'checkLogin',
                'login' : $(this).val()
            },
            success: function (response) {
                if (response) {
                    $('#reg').removeAttr('disabled');
                    $('.checkLogin').html('');
                } else {
                    $('#reg').attr('disabled', 'disabled');
                    $('.checkLogin').html('Логин уже существует');
                }
            }
        })
    })
});


