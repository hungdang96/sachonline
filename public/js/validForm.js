$(document).ready(function () {
    var txtbox = $('#addname').val().toString();
    if (txtbox.equals(''))
    {
        $('#addbtn').prop('disabled',true);
    }
    else
    {
        $('#addbtn').prop('disabled',false);
    }
});