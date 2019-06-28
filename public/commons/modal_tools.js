
/**
 * Utilities to handle modals and modalized views
 * @private
 */
function _ModalTools() {

    /**
     * Fetches a given url and puts the result into modal
     * NOTE: The item to replace inside modal will be the '.modal-body-content'
     * or '.modal-body'
     *
     * @param {string} modalId - Id of bootstrap modal (Without initial hash)
     * @param {string} url - URI from which to fetch view contents
     * @param {Function} [cb] A function to invoke after view rendering
     */
    this.renderView = function (modalId, url, cb) {
        var $modal = $('#' + modalId);

        var $modalBody = $modal.find('.modal-body');
        if ($modalBody.find('.modal-body-content').length > 0) {
            $modalBody = $modalBody.find('.modal-body-content');
        }

        $modalBody.html(this._makeLoading());
        $modal.modal('show');
        $.ajax({
            url: url,
            success: function (response) {
                $modalBody.html(response);
                if (cb) cb();
            }
        });
    };

    this._makeLoading = function () {
        var $container = $('<div>', { class: 'text-center py-5' });
        var $loading = $('<span>', { class: 'fas fa-5x fa-spin fa-spinner' });

        return $container.append($loading);
    }
}

// Exposed globally
var modalTools = new _ModalTools();
