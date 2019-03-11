(function($) {
        "use strict";
        var options = {
                events_source: 'event.php',
                view: 'month',
                tmpl_path: 'tmpls/',
                tmpl_cache: false,
                day: '2018-02-28',
                onAfterEventsLoad: function(events) {
                    if (!events) {
                        return;
                    }
                    var list = $('#eventlist');
                    list.html('');
                    $.each(events, function(key, val) {
                        $(document.createElement('li'))
                            .html('' + val.title + '')
                            .appendTo(list);
                    });
                },
                onAfterViewLoad: function(view) {
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                },
                classes: {
                    months: {
                        general: 'label'
                    }
                }