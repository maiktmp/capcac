
/**
 * Utilities to handle laravel forms through ajax
 * @private
 */
function _FormTools() {
    var _self = this;

    /**
     * Adds a listener for 'submit' event on specified form
     * and uses ajax instead to submit it
     *
     * @param {string} formId - If of bootstrap form (Without initial hash)
     * @param {Function} onSuccess - A function to invoke after successful form submit
     * @param {Function} [onError] - A function to invoke after a failed form submit
     */
    this.useAjaxOnSubmit = function (formId, onSuccess, onError) {
        var $form = $('#' + formId);
        $form.submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('action');

            // Hide all form groups and btn-primary
            $(this).find('.form-group').addClass('d-none');
            $(this).find('.btn-primary').addClass('d-none');

            var $loading = _self._makeLoading();
            $(this).append($loading);

            // Post data to backend
            var data = $(this).serialize();
            var $form = $(this);
            $.ajax({
                method: 'POST',
                url: url,
                data: data,
                success: function (response, textStatus, xhr) {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        if (onSuccess) onSuccess();
                    }
                },
                error: function (jqXHR) {
                    if (onError) onError();

                    // noinspection JSUnresolvedVariable
                    if (jqXHR.responseJSON) {
                        var response = jqXHR.responseJSON;
                        _self._removeErrorsFromForm($form);
                        _self._addErrorsToForm(response.errors, $form);

                        // Show form again
                        $loading.remove();
                        $form.find('.form-group').removeClass('d-none');
                        $form.find('.btn-primary').removeClass('d-none');
                    }
                }
            })
        });
    };

    this._addErrorsToForm = function (errors, $form) {
        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
                var arrErrors = errors[key];
                if (key.includes('.')) {
                    key = this._processKey(key);
                }

                var $input = $form.find('input[name="' + key + '"]');
                if ($input.length === 0) {
                    $input = $form.find('textarea[name="' + key + '"]');
                }

                if ($input) {
                    var $error = $('<span>', {
                        class: 'invalid-feedback',
                        text: arrErrors[0]
                    });
                    $input.addClass('is-invalid');
                    $input.parent().append($error);
                }
            }
        }
    };

    this._removeErrorsFromForm = function ($form) {
        $form.find('.form-group').each(function () {
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('.invalid-feedback').remove();
        });
    };

    this._makeLoading = function () {
        var $container = $('<div>', { class: 'text-center py-5' });
        var $loading = $('<span>', { class: 'fas fa-5x fa-spin fa-spinner' });

        return $container.append($loading);
    }

    this._processKey = function(key) {
        var keys = (key.split("."));
        var result = "";

        keys.forEach(function (current, i) {
            if (i === 0) {
                result += current;
            }
            else {
                result += "[" + current + "]";
            }
        });

        return result;
    }
}

// Exposed globally
var formTools = new _FormTools();