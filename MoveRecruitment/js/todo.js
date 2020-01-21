function todo() {
    $.ajax({
        url: '../controller/read_todo.php',
        method: 'POST',
        data: {
            userID: user_id
        },
        success: function (answer) {
            $("#myUL").html(answer);
            // Create a "close" button and append it to each list item
            var myNodelist = document.getElementsByClassName("do");
            var i;
            for (i = 0; i < myNodelist.length; i++) {
                var span = document.createElement("SPAN");
                var txt = document.createTextNode("\u00D7");
                span.className = "close";
                span.appendChild(txt);
                myNodelist[i].appendChild(span);
            }

            // Click on a close button to hide the current list item
            var close = document.getElementsByClassName("close");
            var list = document.getElementsByClassName("do");
            var i;
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function () {
                    var div = this.parentElement;
                    //div.style.display = "none";
                    var id = $(div).attr('id');
                    $.ajax({
                        url: '../controller/delete_todo.php',
                        data: {
                            id: id
                        },
                        method: 'POST',
                        success: function (answer) {
                            if (answer == 1) {
                                todo();
                            } else {
                                alert(answer);
                            }
                        }
                    })
                }
            }

            // Add a "checked" symbol when clicking on a list item
            for (i = 0; i < list.length; i++) {
                list[i].onclick = function (ev) {
                    if (ev.target.tagName === 'LI') {
                        var id=$(ev.target).attr('id');
                        var status = 0;
                        if($(ev.target).hasClass('checked')){
                            status = 1;
                        }
                        $.ajax({
                            url: '../controller/update_todo.php',
                            data: {
                                id: id,
                                status: status
                            },
                            method: 'POST',
                            success: function (answer) {
                                if (answer == 1) {
                                    ev.target.classList.toggle('checked');;
                                } else {
                                    alert(status);
                                }
                            }
                        });
                        
                    }
                }
            }
        }
    });
}
todo();

// Create a new list item when clicking on the "Add" button
$("#todo-btn").on("click", function () {
    var text = $("#myInput").val();
    $.ajax({
        url: '../controller/add_todo.php',
        data: {
            userID: user_id,
            text: text
        },
        method: 'POST',
        success: function (answer) {
            if (answer == 1) {
                todo();
                $("#myInput").val("");
            } else {
                alert(answer);
            }
        }
    });
});