function updateSheduleSelects (event) {
    var $class = $('#sheduleform-id_class');
    var $teacher = $('#sheduleform-id_teacher');
    var $item = $('#sheduleform-id_item');
    var $day = $('#sheduleform-day_nidely');
    var $lesson = $('#sheduleform-number_urok');

    switch (true) {
        case $class.is(event.target) :
            $teacher.val('').children().not(':first').remove();
            $item.val('').children().not(':first').remove();
            $day.val('').children().not(':first').remove();
            $lesson.val('').children().not(':first').remove();
            break;
        case $teacher.is(event.target) :
            $item.val('').children().not(':first').remove();
            $day.val('').children().not(':first').remove();
            $lesson.val('').children().not(':first').remove();

            if ($teacher.val()) {
                loadItems($teacher.val());
            }
            break;
        case $item.is(event.target) :
            $day.val('').children().not(':first').remove();
            $lesson.val('').children().not(':first').remove();

            if ($item.val()) {
                loadDays();
            }
            break;
        case $days.is(event.target) :
            $lesson.val('').children().not(':first').remove();

            if ($day.val()) {
                loadLessons();
            }
            break;

    }
}

function loadItems(teacherId) {
    $.ajax({
        url: sheduleAjaxUrl,
        data: {
            select: 'items',
            teacherId: teacherId
        },
        dataType: 'json',
        success: function (response) {
            for (var opt in response) {
                $('#sheduleform-id_item').append($('<option value="' + response[opt].value + '">' + response[opt].label + '</option>'));

                // <option value="....">.....</option>
            }
        }
    })
}

$(function() {
    if ($('#shedule-form').length) {
        $('#shedule-form select').change(updateSheduleSelects);
    }


});
