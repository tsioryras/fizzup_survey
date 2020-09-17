/*******************manage star animation ******************/
let ratings = $('.rating');

//manage star while rating
ratings.on('change', function () {
    let note = parseInt($(this).val());
    if ($(this).prop('checked')) {
        for (let i = note; i > 0; i--) {
            $("#rating-" + i).prop('checked', true);
            $("#star-rating-" + i).addClass('fa-star').removeClass('fa-star-o');
        }
    } else {
        let next_star = $("#rating-" + (note + 1)).prop('checked');
        if (next_star) {
            $("#rating-" + note).prop('checked', true);
            $("#star-rating-" + note).addClass('fa-star').removeClass('fa-star-o');
        } else {
            $("#rating-" + note).prop('checked', false);
            $("#star-rating-" + note).addClass('fa-star-o').removeClass('fa-star');
        }
        for (let j = note + 1; j <= ratings.length; j++) {
            $("#rating-" + j).prop('checked', false);
            $("#star-rating-" + j).addClass('fa-star-o').removeClass('fa-star');
        }
    }
});


$('input.filter-note').on('change', function () {
    if ($(this).prop('checked')) {
        $(".filter-note-star-" + $(this).val()).addClass('fa-star').removeClass('fa-star-o');
    } else {
        $(".filter-note-star-" + $(this).val()).addClass('fa-star-o').removeClass('fa-star');
    }

    let all_checked = true;
    $('input.filter-note').each(function () {
        if (!$(this).prop('checked')) {
            all_checked = false;
        }
    });
    $('input.filter-note-all').prop('checked', all_checked);
});

//list filtering
$('input.filter-note-all').on('change', function () {
    let all_checked = $(this).prop('checked');
    $('input.filter-note').each(function () {
        $(this).prop('checked', all_checked);
        if (all_checked) {
            $(".filter-note-star-" + $(this).val()).addClass('fa-star').removeClass('fa-star-o');
        } else {
            $(this).prop('checked', false);
            $(".filter-note-star-" + $(this).val()).addClass('fa-star-o').removeClass('fa-star');
        }
    });
});

/*******************end manage star animation ******************/

/*************uploading images***************/
function removeArrayElement(array, index) {
    let resultArray = [];
    for (let i = 0; i < array.length; i++) {
        if (array[i].index !== index) {
            resultArray.push(array[i]);
        }
    }
    return resultArray;
}

let uploaded_pictures = [];

//show preview image
$("#survey_pictures").on('change', function () {
    let input = $(this);
    for (let i = 0; i < input[0].files.length; i++) {
        uploaded_pictures.push({index: i, value: input[0].files[i]});
        $('#images-preview').append('<div class="preview">' +
            '<img alt="' + input[0].files[i].name + '" src="' + URL.createObjectURL(event.target.files[i]) + '"/>' +
            '<span class="fa fa-window-close delete-image"  data-file-id="' + i + '" id="' + input[0].files[i].name + '"></span>' +
            '</div>');
    }
});

//Delete file not uploaded
$("#images-preview").on('click', 'span.delete-image', function () {
    if (uploaded_pictures.length === 1) {
        uploaded_pictures = [];
    } else {
        uploaded_pictures = removeArrayElement(uploaded_pictures, $(this).data('file-id'));
    }
    $(this).parent().remove();
});
/*************end uploading images***************/

$('.image-comment').on('click', function () {
    console.log($(this).attr('src'));
    $('#image-card').html('<img src="' + $(this).attr('src') + '" alt="image" id="show-image">');
    $('#image-render').removeClass('d-none');
});

$("button[data-dismiss=alert]").on('click', function () {
    $('#image-render').addClass('d-none');
});