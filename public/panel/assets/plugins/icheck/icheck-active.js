$(document).ready(function () {

    "use strict"; // Start of use strict

    $('.skin-minimal .i-check input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%'
    });

    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });


    $('.skin-flat .i-check input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });

    $('.skin-line .i-check input').each(function () {
        var self = $(this),
                label = self.next(),
                label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
});