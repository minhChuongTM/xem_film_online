/*==============================
    Upload cover
    ==============================*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#form__img").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#form__img-upload").on("change", function () {
    readURL(this);
});
$("#form__img-upload1").on("change", function () {
    readURL(this);
});

/*==============================
	Upload gallery
	==============================*/
$(".form__gallery-upload").on("change", function () {
    var length = $(this).get(0).files.length;
    var galleryLabel = $(this).attr("data-name");

    if (length > 1) {
        $(galleryLabel).text(length + " files selected");
    } else {
        $(galleryLabel).text($(this)[0].files[0].name);
    }
});

/*==============================
	Upload video
==============================*/
$(".form__video-upload").on("change", function () {
    var videoLabel = $(this).attr("data-name");

    if ($(this).val() != "") {
        $(videoLabel).text($(this)[0].files[0].name);
    } else {
        $(videoLabel).text("Upload video");
    }
});
