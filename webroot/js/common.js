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
        p += "&export_data=1";
        if (action != 'index') {
            location.href = baseUrl + '/' + controller + '/' + action + '.xlsx?' + p;
        } else {
            location.href = baseUrl + '/' + controller + '.xlsx?' + p;
        }
        return false;
    });
    $(".btn-renewal").click(function () {
        var items = getItemsChecked('items[]', ',');
        if (items == '') {
            showAlertModal('Vui lòng chọn dữ liệu');
            return false;
        }
        var type = $(this).attr('data-type');
        $('.renewal-type-body').hide();
        $('.renewal-by-' + type).show();
        $('#modal_renewal').modal();
        $('#btn-modal-renewal').unbind('click').bind('click', function(){
            monthlyCardRenewal(type, items);
        });
        return false;
    });
    $('.select2').select2();
    
    $('#permissionType').on('change', function(){
        var type = $(this).val();
        location.href = baseUrl + '/settings/permission/' + type;
    });
    
    $(".checkAll").click(function () {
        var id = $(this).attr('data-id');
        $(".subCheckbox_" + id + " .check").prop('checked', $(this).prop('checked'));
    });
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

/**
 * Monthlycard renewal
 */
function monthlyCardRenewal(type, ids) {
    var param = [];
    if (type == 'date-selected') {
        var dateFrom = $('#renewal_date_from').val();
        var dateTo = $('#renewal_date_to').val();
        if (dateFrom == '') {
            alert('Vui lòng chọn ngày bắt đầu');
            return false;
        }
        if (dateTo == '') {
            alert('Vui lòng chọn ngày kết thúc');
            return false;
        }
        param = {
           'date_from': dateFrom,
           'date_to': dateTo,
           'ids': ids,
           '_csrfToken': _csrfToken
        };
    } else {
        var days = $('#renewal_days').val();
        if (days == '') {
            alert('Vui lòng nhập số ngày cần gia hạn');
            return false;
        }
        param = {
            'days': days,
            'ids': ids,
            '_csrfToken': _csrfToken
        };
    }
    $.ajax({
        type: "POST",
        url: baseUrl + '/ajax/monthlycardrenewal',
        data: param,
        success: function (response) {
            if (response == 'OK') {
                location.reload();
            } else {
                alert(response);
            }
        },
        complete: function(){
            
        }
    });
}