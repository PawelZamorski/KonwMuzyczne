$(document).ready(function() {

    var counter = document.getElementById('counter');

    if (counter) {
        var waypoint = new Waypoint({
            element: counter,
            handler: function(direction) {

                if (direction === 'down') {
                    $('.count').each(function () {
                        $(this).prop('Counter',0).animate({
                            Counter: $(this).text()
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });
                }

            },
            offset: '90%'
        });
    }

    var progress = document.getElementById('progress');

    if (progress) {
        var waypoint2 = new Waypoint({
            element: progress,
            handler: function(direction) {

                $('.stats li').each(function(i) {
                    var width = $(this).data('width');
                    $(this).width(width);
                    $(this).addClass('golden-background');
                })

            },
            offset: '90%'
        });
    }
});
