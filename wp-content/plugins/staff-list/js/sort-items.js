jQuery(document).ready(function($) {

    // Sortable Table
    if ($('#sort-items-tbl').length > 0){
            $('#sort-items-tbl tbody').sortable({
                    axis: 'y',
                    handle: '.column-order img, .column-photo img',
                    placeholder: 'ui-state-highlight',
                    forcePlaceholderSize: true,
                    update: function(event, ui) {
                        var items = $(this).sortable('toArray');
                        var data = {
                                action: 'update_list_order',
                                security: abcfslVars.ajaxNonce,
                                order: items
                        };
                        $.post(ajaxurl, data);
                    }
            }).disableSelection();
    }
});




