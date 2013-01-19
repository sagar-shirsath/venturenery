function isValidDate(year, month, day) {
    var date = new Date(year, (month - 1), day);
    var DateYear = date.getFullYear();
    var DateMonth = date.getMonth();
    var DateDay = date.getDate();
    if (DateYear == year && DateMonth == (month - 1) && DateDay == day)
        return true;
    else
        return false;
}

/*
 * This function checks if there is at-least one element checked in a group of check-boxes or radio buttons.
 * @id: The ID of the check-box or radio-button group
 */
function isChecked(id) {
    var ReturnVal = false;
    $("#" + id).find('input[type="radio"]').each(function () {
        if ($(this).is(":checked"))
            ReturnVal = true;
    });
    $("#" + id).find('input[type="checkbox"]').each(function () {
        if ($(this).is(":checked"))
            ReturnVal = true;
    });
    return ReturnVal;
}

function check_user(val,flag) {
    if (val != '' && val.match(/^[^\W][a-zA-Z0-9\_\-\.]+([a-zA-Z0-9\_\-\.]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/)) {
        console.log($("#loading"));
        $(this).ajaxStart(function () {
            $('#busy-indicator').show();
            $('#unavailable').hide();
            $('#available').hide();
        });

        $("#loading").ajaxStop(function () {
            $('#busy-indicator').hide();
        });

        return $.ajax({
            url:'/users/check_availability',
            type:'post',
            async:false,
            data:{data:{username:val, flag:flag}},
            success:function (response) {
                if (response != 1) {
                    $('#available').show();
                    $('#unavailable').hide();
                } else {
                    $('#available').hide();
                    $('#unavailable').show();
                }
                $('#busy-indicator').hide();
            }
        }).responseText;
    } else {
        $('#busy-indicator').hide();
        return false;
    }
}

function check_organisation(val) {
    return $.ajax({
        url:'/users/check_availability',
        type:'post',
        async:false,
        data:{data:{organisation:val}}
    }).responseText;
}

//checking for unique meter
function check_meter(val) {
    if (val != '' && val.length <= 10) {
        $(this).ajaxStart(function () {
            $('#busy-indicator').show();
            $('#unavailable').hide();
            $('#available').hide();
        });

        $("#loading").ajaxStop(function () {
            $('#busy-indicator').hide();
        });

        return $.ajax({
            url:'/water_meters/check_meter',
            type:'post',
            async:false,
            data:{data:{meter:val}},
            success:function (responce) {
                if (responce != 1) {
                    $('#available').show();
                    $('#unavailable').hide();
                } else {
                    $('#available').hide();
                    $('#unavailable').show();
                }
                $('#busy-indicator').hide();
            }
        }).responseText;
    } else {
        $('#busy-indicator').hide();
        return false;
    }
}

//checking for unique site name
function check_site(val) {
    if ($('#checkName').val() == '' || $('#checkName').val() != val) {
        if (val != '' && val.length <= 25) {
            $(this).ajaxStart(function () {
                $('#busy-indicator').show();
                $('#unavailable').hide();
                $('#available').hide();
            });

            $("#loading").ajaxStop(function () {
                $('#busy-indicator').hide();
            });

            $('#checkResponse').val($.ajax({
                url:'/sites/check_site_name',
                type:'post',
                async:false,
                data:{data:{site:val}},
                success:function (responce) {
                    if (responce != 1) {
                        $('#available').show();
                        $('#unavailable').hide();
                    } else {
                        $('#available').hide();
                        $('#unavailable').show();
                    }
                    $('#busy-indicator').hide();
                }
            }).responseText);
        } else {
            $('#busy-indicator').hide();
            $('#checkResponse').val(1);
        }
    } else {
        $('#available').show();
        $('#checkResponse').val('');
    }
}

function check_project(val) {
    if (val != '' && val.length <= 20) {

        $(this).ajaxStart(function () {
            $('#busy-indicator').show();
            $('#unavailable').hide();
            $('#available').hide();
        });

        $("#loading").ajaxStop(function () {
            $('#busy-indicator').hide();
        });

        return $.ajax({
            url:'/projects/check_project',
            type:'post',
            async:false,
            data:{data:{project:val}},
            success:function (responce) {
                if (responce != 1) {
                    $('#available').fadeIn();
                    $('#unavailable').fadeOut();
                } else {
                    $('#available').fadeOut();
                    $('#unavailable').fadeIn();
                }
                $('#busy-indicator').hide();
            }
        }).responseText;
    } else {
        $('#busy-indicator').hide();
        return false;
    }
}

function check_password(val) {
    return $.ajax({
        url:'/users/check_availability',
        type:'post',
        async:false,
        data:{data:{password:val}}
    }).responseText;
}

// Only images
function validateFileUpload(val) {
    if ((val !== '') && (!/(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$/i.test(val))) {
        return false;
    } else {
        return true;
    }
}

// Only csv files
function validateCsvUpload(val) {
    if ((val !== '') && (!/(\.csv)$/i.test(val))) {
        return false;
    } else {
        return true;
    }
}

function convertMonthNameToNumber(monthName) {
    var myDate = new Date(monthName + " 1, 2000");
    var monthDigit = myDate.getMonth();
    return isNaN(monthDigit) ? 0 : (monthDigit + 1);
}