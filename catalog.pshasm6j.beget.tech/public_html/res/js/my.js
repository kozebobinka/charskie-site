"use strict";

jQuery(document).ready(function () {
    jQuery('#search').keydown(function (e) {
        if (e.keyCode == 13) {
            do_search();
        }
    });
});

function show_form(str) {
    jQuery('.hidden-form').fadeIn();
    jQuery('#change_p').html(str);
}

// Отправка данных на сервер
jQuery('#mail-form').trigger('reset');
jQuery(function () {
    'use strict';

    jQuery('#mail-form').on('submit', function (e) {
        e.preventDefault();

		var form_data = new FormData(this);
		form_data.append('url', window.location.href);

        jQuery.ajax({
            url: 'https://catalog.charskie.com/send_mail.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (msg) {
                if (msg == 'ok') {
                	jQuery('.modal-body').html('Спасибо за Ваш запрос. Мы свяжемся с Вами в ближайшее время.');
                    jQuery('#mail-form').trigger('reset'); // очистка формы
                } else {
					jQuery('.modal-body').html(msg);
                }
				jQuery('#myModal').modal();
            }
        });
    });
});