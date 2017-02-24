(function(){

    //add new user ---------------------------------------
    $('#submit').on('click', function(e){
        e.preventDefault();
        var name = $('#name').val();
        var phone = $('#phone').val();

        $.ajax({
            type: 'POST',
            url: 'php/add.php',
            data: {
                name: name, 
                phone: phone 
            },
            success: function (data) {
                if(data != ''){
                    render();
                    $('#name').val('');
                    $('#phone').val('');
                }
                else{
                    alert('Заполнены не все поля');
                }
            }
        });
    });
    
    //update user ------------------------------------------
    $('body').on('click', '.update', function(){
        var id = $(this).closest("li").attr('data_id');

        $.ajax({
            type: 'GET',
            url: 'php/update.php',
            data: {
                id: id
            },
            success: function (data) {
                $('#modal').empty();
                $('#modal').append(data);
                $('#modal').css("display", "block");
            }
        });
    });

    //delete number
    $('body').on('click', '.delete_phone', function(){
        var row = $(this).closest("div").empty();
    });

    //add number
    $('body').on('click', '#addNumber', function(e){
        e.preventDefault();
        var form = $('#update_form');
        var div = $('<div class="row" />');
        var input = $('<input type="text" name="phones[]">');
        var span = $('<span class="delete_phone">Удалить</span>');
        div.append(input);
        div.append(span);
        div.insertBefore( $( "#update_form input[type='hidden']" ).last() );
    });
    
    //save user
    $('body').on('click', '#update', function(e){
       e.preventDefault();
       var form = document.forms.form;
       var formData = new FormData(form);
        formData.append('update', true);
        $.ajax({
            type: 'POST',
            url: 'php/update.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               render();
                $('#modal').css('display', 'none');
            }
        });
    });

    //close modal window
    $('body').on('click', '.close', function(){
        $('#modal').css('display', 'none');
    });
    
    
    //delete user -----------------------------------------------
    $("body").on('click','.delete', function(){
        var id = $(this).closest("li").attr('data_id');
       
        $.ajax({
            type: 'POST',
            url: 'php/delete.php',
            data: {
                id: id                
            },
            success: function (data) {
                if(data != ''){
                    render();
                    alert(data);
                }
                else{
                    alert('произошла ошибка');
                }
            }
        });
    });
    
    //render page -----------------------------------------------
    var render = function(){
        $.ajax({
            type: 'POST',
            url: 'php/partial_view.php',
            success: function (data) {
                $('#main').empty();
                $('#main').append(data);
            }
        });
    };
    
}());