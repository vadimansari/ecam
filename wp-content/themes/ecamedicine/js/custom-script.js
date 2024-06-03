$(document).ready(function() {
    // Multi-step form logic
    var currentStep = 1;
    var formSteps = $('.form-step');
    var nextButtons = $('.next-step');
    var prevButtons = $('.prev-step');
    var submitButton = $('.submit-form');
    var selectedOptionsDisplay = $('#selectedOptions');
    var selectedOptions = []; // Array to store selected options

    function showStep(step) {
        formSteps.removeClass('active');
        $('#step-' + step).addClass('active');
    }

    nextButtons.click(function() {
        // Check if any option is selected before proceeding
        var options = $('.form-step.active .options.active');
        if (options.length > 0) {
            currentStep++;
            showStep(currentStep);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please select an option before proceeding.'
            });
        }
    });

    prevButtons.click(function() {
        currentStep--;
        showStep(currentStep);
    });

    submitButton.click(function() {
        // Check if any option is selected before submitting
        var options = $('.form-step.active .options.active');
        if (options.length > 0) {
            // Get the topic ID value (replace with your logic to get the actual topic ID)
            var topicID = '194';
            var meta_key = 'topicID';

            // Make AJAX request to check and update user meta
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'check_and_update_user_meta',
                    security: ajax_object.nonce,
                    topicID: topicID,
                    meta_key: meta_key
                },
                success: function(response) {
                    if (response.success) {
                        // Handle successful update
                        window.location.href = 'http://localhost/ecamedicine/student-registration/';
                        popupOverlay.style.display = 'none';
                    } else {
                        // Handle error
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.data
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.'
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please select an option before submitting.'
            });
        }
    });

    showStep(currentStep);

    // Options selection logic
    $('.answerBox .options').click(function() {
        // Remove active class from all options
        var parent = $(this).closest('.answerBox');
        parent.find('.options').removeClass('active');
        // Add active class to the clicked option
        $(this).addClass('active');
        // Store the selected option value
        var step = $(this).closest('.form-step').attr('id').split('-')[1];
        selectedOptions[step - 1] = $(this).text().trim();
        // Update the selected options display
        selectedOptionsDisplay.text(selectedOptions.join(', '));
    });
});
