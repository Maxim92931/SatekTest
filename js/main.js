
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

    $('#edit').submit(function (e) {
        e.preventDefault();
        var id = location.href.split('/');
        id = id[id.length - 1];

        $.ajax({
            url: 'scraps',
            type: 'POST',
            data: {
              'action' : 'editScrap',
              'id' : id,
              'title' : $('#inputTitle').val(),
              'text' : $('#inputText').val()
            },
            success: function (responce) {
                document.location.replace('/scraps');
            }
        })
    })

    $('#new').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: 'new',
            type: 'POST',
            data: $(this).serialize(),
            success: function () {
                document.location.replace('/scraps');
            }
        })
    })

    $('#deleteScrap').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: '',
            type: 'POST',
            data: {'action' : 'delete'},
            success: function () {
                document.location.replace('/scraps');
            }
        })
    })
});


