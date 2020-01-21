<div class="col-lg-12">
    <div class="block block1">
        <div class="title"><strong>Durations List</strong><br>Total: <span class="total-durations">0</span></div>

        <table class="table own-table edit-student-table rowtt-table" id="edit_student_form">
            <thead class="thead-dark">
                <tr class="rowtt" id="table-head" class="no-action">
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Day</th>
                    <th scope="col">From</th>
                    <th scope="col">TO</th>
                    <th scope="col">Counter</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
    function tConv24(time24) {
        var ts = time24;
        var H = ts.substr(0, 2);
        var h = (H % 12) || 12;
        h = (h < 10) ? ("0" + h) : h;  // leading 0 at the left for 1 digit hours
        var ampm = H < 12 ? " AM" : " PM";
        ts = h + ts.substr(2, 3) + ampm;
        return ts;
    }





    function deleteDuration(id) {
        swal({
            title: 'Are you sure you want to remove duration?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-success btn-remove',
            cancelButtonClass: 'btn btn-danger'
        });

        $(".btn-remove").on("click", function () {
            $.ajax({
                url: '../controller/delete_duration.php',
                data: {
                    id: id
                },
                method: 'POST',
                success: function (answer) {
                    if (answer) {
                        var row = "#tr-" + id + " .td-" + id + " span";
                        $(".total-durations").html(parseInt($(".total-durations").html()) - parseInt($(row).html()));
                        row = "#tr-" + id;
                        $(row).remove();
//                        console.log(parseInt($(".total-durations").html()));
//                        console.log(row);
//                        console.log(parseInt($(row).html()));
                        swal('Done', 'Duration successfully removed!', 'success');
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please, check your connection!'
                        });
                    }
                }
            });
        });
    }

    function getDurations(departmentID) {

        $.ajax({
            url: "../controller/get_durations.php",
            method: 'POST',
            data: {
                department_id: departmentID
            },
            success: function (answer) {
                var total = 0;
                var counter = 0;
                var arr = answer.split("!^@");
                var rows = "";
                for (var row = 0; row < arr.length; row++) {
                    var arr2 = arr[row].split("~");
                    if (arr2.length != 1) {
                        counter++;
                        rows += "<tr id='tr-" + arr2[0] + "' class='rowtt'>";
                        rows += "<td>" + counter + "</td>";
                        rows += "<td>" + arr2[5] + "</td>";
                        rows += "<td>" + arr2[1] + "</td>";
                        rows += "<td>" + tConv24(arr2[2]) + "</td>";
                        rows += "<td>" + tConv24(arr2[3]) + "</td>";
                        rows += "<td class='td-" + arr2[0] + "' onclick='updateCounter(\".td-" + arr2[0] + "\"," + arr2[0] + ")'><input type='number' value ='" + arr2[4] + "' min='0' style='display: none;width: 55px;'><span class='ctr'>" + arr2[4] + "</span></td>";
                        rows += "<td> <button class='btn-danger btn-del' onclick='deleteDuration(" + arr2[0] + ")'><i class='fa fa-trash' style='margin-right: 5px;'></i>Remove</button> </td>";
                        rows += "</tr>";
                        total += parseInt(arr2[4]);
                    }
                }
                $(".total-durations").html(total);
                $('.edit-student-table tbody').append(rows);
            }
        });
    }

    function updateCounter(td, id) {
        var input = td + " input";
        var span = td + " span";
        var oldValue = parseInt($(input).val());
        var total = parseInt($(".total-durations").html());
        $(span).hide();
        $(input).show();
        $(input).focus();
        if (isInteger($(input).val())) {
            $(input).focusout(function () {
                $.ajax({
                    url: "../controller/update_counter.php",
                    method: "POST",
                    data: {
                        id: id,
                        counter: $(input).val()
                    },
                    success: function (answer) {
                        if (answer == "success") {
                            $(span).html($(input).val());
                            total = total - oldValue + parseInt($(input).val());
                            $(".total-durations").html(total);
                            $(input).hide();
                            $(span).show();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: answer
                            });
                        }
                    }
                });
                $(input).hide();
                $(span).show();
            });
        } else {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Please, enter a valid number'
            });
        }
    }

    $("#applicant-department").on("change", function () {
        getDurations($("#applicant-department").val());
    });

    if (user_type_id == 2) {
        getDurations(1);
    } else if (user_type_id == 3) {
        getDurations(2);
    } else if (user_type_id == 4) {
        getDurations(3);
    } else if (user_type_id == 5) {
        getDurations(4);
    } else if (user_type_id == 6) {
        getDurations(5);
    } else if (user_type_id == 7) {
        getDurations(6);
    } else if (user_type_id == 8) {
        getDurations(7);
    } else if (user_type_id == 9) {
        getDurations(8);
    } else if (user_type_id == 1) {
        getDurations("all");
    }

    function isInteger(value) {
        if (parseInt(value, 10).toString() === value) {
            return true;
        }
        return false;
    }
</script>