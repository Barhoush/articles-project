$(document).ready(function(){
    // $("[data-toggle=tooltip]").tooltip();
    $('.comment-submit').click(function () {
        var _data   =   {
            '_token': $('input[name="_token"]').val(),
            'comment'   : $("#comment-text").val()
        };

        $.ajax({
            'method'    :   'POST',
            'url'   :   _commentRoute,
            'data'  :   _data,
            success:    function (response) {
                var text    =   '';
                $.each(response,    function (key, value) {
                    text    +=  value;
                });
                alert(text);
                location.reload();

            }
        });
    })
});