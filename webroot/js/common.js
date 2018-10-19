/**
 * Main Javascript process
 */

$(document).ajaxStart(function () {
    Pace.restart();
});

$(document).on('submit', '.box-search form, .box-update form', function () {
    Pace.restart();
});

$(document).ready(function ($) {
    // Disable button toggle
    $('.toggle').show();
    $('.toggle-event').change(function () {
        toggleChange(this);
    });

    // Buttons action
    $(".btn-disable").click(function () {
        return disableEnableMulti('disable', true);
    });
    $(".btn-enable").click(function () {
        return disableEnableMulti('enable');
    });
    $(".btn-addnew").click(function () {
        location.href = baseUrl + '/' + controller + '/update';
        return false;
    });
    $(".btn-import-excel").click(function () {
        location.href = baseUrl + '/' + controller + '/import';
        return false;
    });
    $(".btn-export-excel").click(function () {
        var p = $(this).attr('data-param');
        location.href = baseUrl + '/' + controller + '.xlsx?' + p;
        return false;
    });
    $('.select2').select2();
});

/**
 * Update multi (enable/disable)
 * @param {string} type
 * @returns {Boolean}
 */
function disableEnableMulti(type, mess) {
    if (typeof mess == 'undefined') {
        mess = false;
    }
    var items = getItemsChecked('items[]', ',');
    if (items == '') {
        showAlertModal('Vui lòng chọn dữ liệu');
        return false;
    }
    if (mess && !confirm('Bạn có chắc chắn muốn xóa dữ liệu này?')) {
        return false;
    }
    
    $("#action").val(type);
    return true;
}

/**
 * Get list item checked
 * @param {type} strItemName
 * @param {type} sep
 * @returns {String}
 */
function getItemsChecked(strItemName, sep) {
    var x = document.getElementsByName(strItemName);
    var p = "";
    for (var i = 0; i < x.length; i++) {
        if (x[i].checked) {
            p += x[i].value + sep;
        }
    }
    var result = (p != '' ? p.substr(0, p.length - 1) : '');
    return result;
}

/**
 * Check all item in data search result
 */
function checkAll(strItemName, value) {
    var x = document.getElementsByName(strItemName);
    for (var i = 0; i < x.length; i++) {
        if (value == 1 && !x[i].disabled) {
            if (!x[i].checked) {
                x[i].checked = 'checked';
            }
        } else {
            if (x[i].checked) {
                x[i].checked = '';
            }
        }
    }
}

/**
 * On change toggle
 * 
 * @param {object} item
 */
function toggleChange(item) {
    var revertClassFlg = 'reverted';
    if ($(item).hasClass(revertClassFlg)) {
        return false;
    }

    // Init
    var _this = $(item);
    var id = _this.val();
    var data_field = _this.attr('data-field');
    var data_controller = controller;
    var classList = _this.attr('class').split(/\s+/);//get controller in case there are multi-controllers on a screen
    if (classList.length == 2) {
        data_controller = classList[1];
    }

    // Select action
    if (data_field == 'disable') {
        var disable = $(item).prop('checked') ? 1 : 0;
        var data = {
            controller: data_controller,
            action: action,
            id: id,
            disable: disable
        };
        $.ajax({
            type: "POST",
            url: baseUrl + '/ajax/disable',
            data: data,
            success: function (response) {
                if (response) {
                    // Revert checkbox
                    $(item).addClass(revertClassFlg);
                    $(item).prop('checked', disable == 0).change();
                    $(item).removeClass(revertClassFlg);

                    // Show error
                    showAlertModal(response);
                }
            },
            complete: function(){
                location.reload();
            }
        });
    }

    return false;
}

/**
 * Show alert using bootstrap modal
 * @param {string} message
 */
function showAlertModal(message) {
    $('#modal_alert_body').html(message);
    $('#modal_alert').modal('show');
}

/**
 * Go back
 */
function back(redirect) {
    if (typeof redirect !== 'undefined' && redirect !== '') {
        location.href = redirect;
    } else if (referer.indexOf(url) === -1) {
        location.href = referer;
    } else {
        location.href = '/' + controller;
    }
    return false;
}

/**
 * Check input file is Image
 * @param {Object} input
 * @returns {Boolean}
 */
function is_image_type(input) {
    var image_types = ['image/jpg', 'image/jpeg', 'image/png'];
    return $.inArray(input['type'], image_types) >= 0;
}

/*
 * only value array
 * @param {type} value
 * @param {type} index
 * @param {type} self
 * @returns {Boolean}
 */
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}

/**
 * Download csv file sample
 */
function downloadFileSample(name) {
    var url = baseUrl + '/samplefiles/' + name;
    window.location = url;
    return false;
}