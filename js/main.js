$(function(){
    $('.tip').tooltip();
});

$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', $(this).attr('href'));
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});