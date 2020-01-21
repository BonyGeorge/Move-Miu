<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<!--

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Add Employee</strong></div>

        <div class="block-body">
            <form class="form-horizontal" id="add-employee-form"  action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Type</label>
                    <div class="col-sm-9 select">
                        <select id="type-list" name="account" class="form-control mb-3 employee-types" required>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Name</label>
                    <div class="col-sm-9">
                        <input id="empoyee-name" type="text" name="name" class="form-control name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Email</label>
                    <div class="col-sm-9">
                        <input id="empoyee-mail" type="email" name="mail" class="form-control email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input id="empoyee-mobile" type="mobile" name="mobile" class="form-control mobile" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Address</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4">
                                <select id="type-list2" name="country" class="form-control mb-3 country" required>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="type-list3" name="state" class="form-control mb-3 state" style="display: none" required>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="type-list4" name="city" class="form-control mb-3 city" style="display: none" required>

                                </select>
                            </div>
                        </div>
                        <div class="row address" style="display: none">
                            <div class="col-md-3 new-city">
                                <input type="text" name="newCity" placeholder="City Name" class="form-control street">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="building" placeholder="Building Number" class="form-control building" required>
                            </div><br>
                            <div class="col-md-6">
                                <input type="text" name="street" placeholder="Street Name" class="form-control street" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Birthdate</label>
                    <div class="col-sm-9">
                        <input id="DOB" name="DOB" type="date" class="form-control DOB" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Gender</label>
                    <div class="col-sm-9">
                        <div class="i-checks">
                            <input id="radioCustom1" type="radio" checked value="1" name="gender" class="radio-template gender">
                            <label for="radioCustom1">Male</label>
                            <input id="radioCustom2" type="radio" value="0" name="gender" class="radio-template gender" style="margin-left: 50px;">
                            <label for="radioCustom2">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Profile Photo</label>
                    <div class="col-sm-5 btn-img-responsive">
                        <input type="file" style="display: none;" id="img-upload" name="img" accept="image/*">
                        <div class="btn btn-primary col-sm-4 ml-auto upload-btn" onclick="document.getElementById('img-upload').click()">Upload</div>
                        <div style="display: inline;" id="img-shape"><img src="../../images/default.jpg" alt="..." style="display: inline; border-radius: 50%;" width="50px" height="50px"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Password</label>
                    <div class="col-sm-9">
                        <input id="password" type="password" name="password" class="form-control password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label password2">Re-enter Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="confirmPassword" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row salary-section" style="display:none">
                    <label class="col-sm-3 form-control-label">Salary</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input id="salary" type="text" name="salary" class="form-control salary">
                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="duration-section">
                    <div class="form-group row col-sm-4">
                        <label class="form-control-label work-lbl">Work Durations<span onclick="addDuration()" class="add-duration container-hover col-sm-1" id="2">+
                                <span class="container-hover-text">Add Duration</span>
                            </span></label>
                    </div>

                    <div class="duration1">
                        <div class="form-group row col-sm-3">
                            <label class="form-control-label duration-lbl"><span onclick='removeDuration(this)' class="remove-duration container-hover col-sm-1" id="1">-
                                    <span class="container-hover-text">Remove Duration</span>
                                </span><span id="durationName1">Duration 1</span></label>
                        </div>
                        <div class="form-group row" id="day-1">
                            <label class="col-sm-3 form-control-label">Day</label>
                            <select name="day" class="form-control day" >

                            </select>
                        </div>
                        <div class="form-group row" id="from-1">
                            <label class="col-sm-3 form-control-label">From</label>
                            <input type="time" name="from" class="form-control" >
                        </div>
                        <div class="form-group row" id="to-1">
                            <label class="col-sm-3 form-control-label">To</label>
                            <input type="time" name="to" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 ml-auto">
                        <button id="add-employee-btn" type="submit" class="btn btn-primary col-sm-12 ml-auto">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(".remove-duration").hide();
    function addDuration() {
        var id = parseInt($(".add-duration").attr("id"));
        var newID = id + 1;
        $(".add-duration").attr("id", newID);
        var classToAppend = id - 1;
        classToAppend = ".duration" + classToAppend;
        var newDurationName = "Duration " + id;
        var newDurationID = "durationName" + id;
        var newDurationClass = "duration" + id;
        var newDayID = "day-" + id;
        var newFromID = "from-" + id;
        var newToID = "to-" + id;
        var newHTML = "<div class='" + newDurationClass + "'><div class='form-group row col-sm-3'><label class='form-control-label duration-lbl'><span onclick='removeDuration(this)' class='remove-duration container-hover col-sm-1' id='" + id + "'>-<span class='container-hover-text'>Remove Duration</span></span><span id='" + newDurationID + "'>" + newDurationName + "</span></label></div><div class='form-group row' id='" + newDayID + "'><label class='col-sm-3 form-control-label'>Day</label><select name='day' class='form-control day' required></select></div><div class='form-group row' id='" + newFromID + "'><label class='col-sm-3 form-control-label'>From</label><input type='time' name='from' class='form-control' required></div><div class='form-group row' id='" + newToID + "'><label class='col-sm-3 form-control-label'>To</label><input type='time' name='to' class='form-control' required></div></div>";
        $(classToAppend).after(newHTML);
        $(".remove-duration").show();
        getDays(newDayID);
        var title = newDurationName + " Added!";
        swal({
            position: 'bottom-end',
            type: 'success',
            title: title,
            showConfirmButton: false,
            timer: 1000
        });
    }

    function removeDuration(attr) {

        swal({
            title: 'Are you sure you want to remove this duration?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-success btn-remove-duration',
            cancelButtonClass: 'btn btn-danger'
        });

        $(".btn-remove-duration").on("click", function () {
            var removeID = parseInt($(attr).attr("id"));
            var addID = parseInt($(".add-duration").attr("id"));
            var newAddID = addID - 1;
            var RemoveDurationClass = ".duration" + removeID;
            $(RemoveDurationClass).remove();
            for (var i = removeID + 1; i < addID; i++) {
                var newID = i - 1;
                var newDivClass = "duration" + newID;
                var newRemoveID = newID;
                var newDurationText = "Duration " + newID;
                var newDurationTextID = "durationName" + newID;
                var newDayID = "day-" + newID;
                var newFromID = "from-" + newID;
                var newToID = "to-" + newID;
                var oldDivClass = ".duration" + i;
                var oldRemoveID = oldDivClass + " #" + i;
                var oldDurationTextID = "#durationName" + i;
                var oldDayID = "#day-" + i;
                var oldFromID = "#from-" + i;
                var oldToID = "#to-" + i;
                $(oldRemoveID).attr("id", newRemoveID);
                $(oldDivClass).attr("class", newDivClass);
                $(oldDurationTextID).html(newDurationText);
                $(oldDurationTextID).attr("id", newDurationTextID);
                $(oldDayID).attr("id", newDayID);
                $(oldFromID).attr("id", newFromID);
                $(oldToID).attr("id", newToID);
            }
            $(".add-duration").attr("id", newAddID);
            if (newAddID == 2) {
                $(".remove-duration").hide();
            } else {
                $(".remove-duration").show();
            }
            swal('Deleted!', 'Duration has been removed!', 'success');
        });
    }

    $("#img-upload").change(function (e) {
        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
            var file = e.originalEvent.srcElement.files[i];
            var img = document.createElement("img");
            var reader = new FileReader();
            reader.onloadend = function () {
                img.src = reader.result;
            }
            img.width = 50;
            img.height = 50;
            reader.readAsDataURL(file);
            $("#img-shape").html(img);
        }
    });
    jQuery.ajax({
        url: "../controller/get_employee_types.php",
        method: 'POST',
        success: function (answer) {
            var arr = answer.split("~");
            var options = "";
            //alert(answer);
            for (var i = 0; i < arr.length; i += 2) {
                options += "<option value='" + arr[i] + "'>" + arr[i + 1] + "</option>";
            }
            jQuery('.employee-types').html(options);
        }
    });
    $(".employee-types").on("change", function () {
        var value = $(this).val();
        if (value == 1 || value == 3) {
            $(".salary-section").fadeOut();
        } else {
            $(".salary-section").fadeIn();
        }

        if (value == 3) {
            $(".duration-section").fadeOut();
        } else {
            $(".duration-section").fadeIn();
        }
    });
    jQuery.ajax({
        url: "../controller/get_countries.php",
        method: 'POST',
        success: function (answer) {
            var arr = answer.split("~");
            var options = "<option value='0'>Select Country</option>";
            for (var i = 0; i < arr.length; i += 2) {
                options += "<option value='" + arr[i] + "'>" + arr[i + 1] + "</option>";
            }
            jQuery('.country').html(options);
        }
    });
    $(".country").on('change', function () {
        var countryID = $(".country").val();
        $(".city").fadeOut();
        $(".address").fadeOut();
        $(".city").html("");
        if (countryID == 0) {
            $(".state").fadeOut();
        } else {
            jQuery.ajax({
                url: "../controller/get_states.php",
                method: 'POST',
                data: {
                    countryID: countryID
                },
                success: function (answer) {
                    //alert(answer);
                    var arr = answer.split("~");
                    var options = "<option value='0'>Select State</option>";
                    for (var i = 0; i < arr.length; i += 2) {
                        options += "<option value='" + arr[i] + "'>" + arr[i + 1] + "</option>";
                    }
                    jQuery('.state').html(options);
                    $(".state").fadeIn();
                }
            });
        }
    });
    $(".state").on('change', function () {
        var stateID = $(".state").val();
        if (stateID == 0) {
            $(".city").fadeOut();
        } else {
            jQuery.ajax({
                url: "../controller/get_cities.php",
                method: 'POST',
                data: {
                    stateID: stateID
                },
                success: function (answer) {
                    //alert(answer);
                    var arr = answer.split("~");
                    var options = "<option value='0'>Select City</option>";
                    for (var i = 0; i < arr.length; i += 2) {
                        options += "<option value='" + arr[i] + "'>" + arr[i + 1] + "</option>";
                    }
                    options += "<option value='new'>New</option>";
                    jQuery('.city').html(options);
                    $(".city").fadeIn();
                }
            });
        }
    });
    $(".city").on("change", function () {
        var cityID = $(this).val();
        if (cityID == 0) {
            $(".address").fadeOut(function () {
                $(".new-city").fadeOut();
            });
        } else if (cityID == "new") {
            $(".new-city").fadeIn(function () {
                $(".address").fadeIn();
            });
        } else {
            $(".new-city").fadeOut(function () {
                $(".address").fadeIn();
            });
        }
    });
    function getDays(id) {
        var selector = "#" + id + " .day";
        jQuery.ajax({
            url: "../controller/get_days.php",
            method: 'POST',
            success: function (answer) {
                var arr = answer.split("~");
                var options = "";
                //alert(answer);
                for (var i = 0; i < arr.length; i += 2) {
                    options += "<option value='" + arr[i] + "'>" + arr[i + 1] + "</option>";
                }
                jQuery(selector).html(options);
            }
        });
    }

    getDays("day-1");
    $("#add-employee-form").on('submit', (function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var rows = parseInt($(".add-duration").attr("id") - 1); // number of durations
        var workDurations = "";
        for (var i = 0; i < rows; i++) {
            var id = i + 1;
            var daySelector = "#day-" + id + " .day";
            var fromSelector = "#from-" + id + " input";
            var toSelector = "#to-" + id + " input";
            var day = $(daySelector).val();
            var from = $(fromSelector).val();
            var to = $(toSelector).val();
            workDurations += day + "~";
            workDurations += from + "~";
            workDurations += to;
            if (i != rows - 1) {
                workDurations += "^@"
            }
            //day~from~to@^day~from~to

        }
        formData.append('workDurations', workDurations);
        $.ajax({
            type: 'POST',
            url: '../controller/add_employee.php',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (answer) {
                if (answer == 1) {
                    swal('Good job!', 'Employee Successfully Submited!', 'success');
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: answer
                    });
                }
            }
        });
    }));
</script>-->



<div class="col-lg-12">
                    <div class="block block1">
                        <div class="title"><strong>Show room</strong></div>
                        
                        
                        <table class="table own-table show-employee-table rowtt-table" id="show_employee_form">
                            <thead class="thead-dark">
                                <tr id="table-head"  class="no-action">
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Type Id</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="block block2"></div>
                </div>
    <script> jQuery.ajax({
    url: "../controller/get_room_info.php",
    method: 'POST',
    success: function (answer) {
        var arr = answer.split("!^@");
        var rows = "";
        var counter = 1;
        for (var row = 0; row < arr.length; row++) {
            var arrValue = arr[row];
            var arr2 = arrValue.split("~");
            for (var data = 0; data < arr2.length; data += 5) {
                rows += "<tr class='rowtt' id='" + arr2[data] + "'>";
                for (var i = 0; i <= arr2.length; i++) {
                    if (i == 0) {
                        rows += "<th scope='row'>" + counter + "</th>";
                    } else {
                        rows += "<td>" + arr2[i - 1] + "</td>";
                    }
                }
                rows+='<td><button id='+arr2[data]+'  onclick="delete_room_type('+arr2[data]+') "class="btn btn-primary col-sm-4 ml-auto edit-btn">Edit</button></td>';
                rows+='<td><button id='+arr2[data]+'  class="btn btn-primary col-sm-4 ml-auto delete-btn">Delete</button></td>';
                
                rows += "</tr>";
                counter++;
            }
        }
        jQuery('table tbody').html(rows);
    }
});


function delete_room_type(type_id)
{
    

           alert(type_id);
        jQuery.ajax({
                url: "../controller/remove_room.php",
                method: 'POST',
                data: {
                    room_type_id: type_id,
                },
                success: function (answer) {
                    alert(answer);
            }
        });
}

   
</script>