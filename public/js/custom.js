function showSnackbar(message, type) {
    $("#snackbar").html(message);
    switch (type) {
        case "error":
            $("#snackbar").css("background-color", "#e74a3b");
            break;
        default:
            $("#snackbar").css("background-color", "#1cc88a");
            break
    }
    $("#snackbar").addClass("show");
    setTimeout(function () { $("#snackbar").removeClass("show"); }, 3000);
}

function pageHandler(currentPage, pages) {
    if (currentPage == 1) {
        $(".page-item.prev").addClass("disabled");
    } else {
        $(".page-item.prev").removeClass("disabled");
    }

    if (currentPage == pages || pages == 0) {
        $(".page-item.next").addClass("disabled");
    } else {
        $(".page-item.next").removeClass("disabled");
    }
}

;
(function ($) {
    $.fn.extend({
        donetyping: function (callback, timeout) {
            timeout = timeout || 1e3;
            var timeoutReference,
                doneTyping = function (el) {
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function (i, el) {
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste', function (e) {
                    if (e.type == 'keyup' && e.keyCode != 8) return;
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function () {
                        doneTyping(el);
                    }, timeout);
                }).on('blur', function () {
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);

// document.getElementById("book-search-field").onkeyup = function(){
//   var name_value = $("#book-search-field").val().toLowerCase();
//   $(".book-class").each(function () {
//     $(this).toggle($(this).text().toLowerCase().includes(name_value));
//   });
// }