
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// todo refactoring
$('#delete-modal').on('show.bs.modal', function (event) {
    var $button = $(event.relatedTarget);
    var id = $button.data('id');
    var $modal = $(this);
    var $deleteForm = $modal.find('.modal-body #delete-expense-form');
    var action = $deleteForm.attr('action');
    $deleteForm.attr('action', action + id);
});

$('#confirm-delete').on('click', function() {
    $('#delete-expense-form').submit();
});

$('.select2').select2({
    width: '100%'
});

$('.modal-confirm-btn').on('click', function() {
    var $this = $(this);
    var $modal = $this.parents('.modal');
    var $modalBody = $this.parents('.modal').find('.modal-body');
    var $modalBodyForm = $modalBody.find('form');
    if($modalBodyForm.length === 1) {
        $modalBodyForm.submit();
    }
});