$.widget('ui.autocomplete', $.ui.autocomplete, {
    _renderMenu: function (ul, items) {
        let that = this;
        ul.attr('class', 'nav nav-pills nav-stacked bs-autocomplete menu');
        $.each(items, function(index, item) {
            that._renderItemData(ul, item);
        });
    },

    _resizeMenu: function() {
        let ul = this.menu.element;
        ul.outerWidth(Math.min(
            ul.width('').outerWidth() + 1,
            this.element.outerWidth()
        ));
    }
});

(function() {
    "use strict";

    $('.bs-autocomplete').each(function() {
        let _this = $(this),
            _data = _this.data(),
            _hidden_field = $('#' + _data.hidden_field_id);
        _this.after('<div class="bs-autocomplete-feedback form-control-feedback"><div class="loader">Loading...</div></div>')
            .parent('.form-group').addClass('has-feedback');

        let feedback_icon = _this.next('.bs-autocomplete-feedback');
        feedback_icon.hide();

        _this.autocomplete({
            minLength: 2,
            autoFocus: true,

            source: function(request, response) {
                $.ajax({
                    url: _data.source,
                    dataType: "json",
                    data: {
                        q: request.term
                    },
                    success: function(data) {
                        response ( data );
                    }
                });
            },

            search: function() {
                feedback_icon.show();
                _hidden_field.val('');
            },

            response: function() {
                feedback_icon.hide();
            },

            focus: function(event, ui) {
                _this.val(ui.item[_data.name]);
                event.preventDefault();
            },

            select: function(event, ui) {
                _this.val(ui.item.name);
                _hidden_field.val(ui.item.id);
                event.preventDefault();
            }
        })
            .data('ui-autocomplete')._renderItem = function(ul, item) {
            return $('<li></li>')
                .data("item.autocomplete", item.name)
                .append('<a>' + item.name + '</a>')
                .appendTo(ul);
        };
        // end autocomplete
    });
})();


/**
 * Iterate over the response from the jquery, return options array
 *
 * @param response the json response from the ajax call
 */
function iterate(response) {
    let filtered = new Array();
    // This was used with
    $.each(response, function(index, item) {
        if(item.id > 0) {
            filtered.push(item);
        }
    });

    return filtered;
}

function format(item) {
    return item.name;
}