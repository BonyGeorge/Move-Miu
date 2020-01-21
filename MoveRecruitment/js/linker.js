$(".link-page").on("click", function () {
    var url = "../controller/get_page.php";
    var pageToGet = $(this).attr("id") + "-li";
    var pageToGet2 = $(this).attr("id");
    var id = "#" + pageToGet + " , ." + pageToGet + "-father";
    jQuery('.page-content').html("<div class='loader'><div class='spinner'></div></div>");
    $(".spinner").show();
    jQuery.ajax({
        url: url,
        data: 'page=' + pageToGet2,
        method: 'POST',
        success: function (answer) {
            $(".page-content").fadeOut(500, function () {
                jQuery('.page-content').html(answer);
                $(".list-unstyled li").removeClass("active");
                $(id).addClass("active");
            }).fadeIn(500);
        }
    });
});