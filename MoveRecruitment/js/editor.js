$("#submit").on("click", function (e) {
    e.preventDefault();
    var val = $("#test").html();
    $.ajax({
        url: "../php/controller/update_aboutus.php",
        method: "POST",
        data: {
            'text': val
        },
        success: function (answer) {
            alert(answer);
        }
    });
});

