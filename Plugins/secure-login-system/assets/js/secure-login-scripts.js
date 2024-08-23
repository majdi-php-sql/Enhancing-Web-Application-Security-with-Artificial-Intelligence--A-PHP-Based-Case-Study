jQuery(document).ready(function($) {
    // Add any custom JS for handling AJAX or form validation here
    $('form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.post(ajaxurl, formData, function(response) {
            alert(response.message);
        });
    });
});
