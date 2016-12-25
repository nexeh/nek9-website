jQuery(document).ready(function($) {

    $('#linesSortCntr .sortable-list').sortable({
            axis: 'y',
            placeholder: 'sortPlaceholder',
            forcePlaceholderSize: true,
            update: function(event, ui) {
                var items = $(this).sortable('toArray');
                var postID = $("#linesSortCntr > ul").attr("id");
                var data = {
                        action: 'update_field_order',
                        security: abcfslVars.ajaxNonce,
                        order: items,
                        postid: postID
                };
                $.post(ajaxurl, data);
            }
    }).disableSelection();

});
