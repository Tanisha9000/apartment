<?php
//echo "<pre>";
//print_r($task);
//echo "</pre>";
//foreach($task as $tas){
//   echo $tas->name;
//}
//foreach ($task as $tas):
////                     if(!empty($tas['add_tasks'])){
////                         echo "hey";
////                     }else{
////                         echo "jgjn";
////                     }
////        echo "<pre>";
////         print_r($tas);
////        echo "</pre>";
//   endforeach;
?>
<section class="content-header">
    <h1>

        <small>Fill Information</small>
    </h1>
    <ol class="breadcrumb">
<!--        <li><a href="index.html"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Properties</a></li>
      <li class="active">Set up Properties </li>-->
    </ol>
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create($property, array(
                    'id' => 'addpropertytask'
                        )
                );
                ?>
                <?php //$this->Form->create($property) ?>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add task</h3>
                    </div>

                    <div class="row box-body">


                        <!-- <div class="col-md-3 vvv">
                                                    <select name="propertyid" class="form-control" placeholder="Name" id="propertyname">
                        <?php //foreach ($property as $pro) {  ?> 
                                                            <option value="<?php // echo $pro->id;    ?>"><?php // echo $pro->jobsitename;    ?></option>
                        <?php // }  ?>
                                                    </select>  
                                                </div>-->
                        <?php if (!empty($building)) { ?>
                            <div class="col-md-3 vvv">

                                <label>Select Building</label>
                                <select name="buildid" class="form-control" placeholder="Name" id="buildname">
                                    <option value="">Select Building</option>
                                    <?php foreach ($building as $key => $build) { ?> 
                                        <option value="<?php echo $key ?>" data-ids="<?php echo $key ?>" class="checkvalue" ><?php echo $build ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        <?php } ?>
                        <div class="col-md-3 vvv">
                            <label id ="labelfloorname">Select Floor</label>
                            <select name="floorid" class="form-control" placeholder="Name" id="floorname">
                                <?php //foreach ($floor as $flo) {  ?> 
                                    <!--<option value="<?php //echo $flo->id;    ?>"><?php // echo $flo->name;    ?></option>-->
                                <?php //}  ?>
                            </select> 
                        </div>

                        <div class="col-md-3 vvv">
                            <label id ="labelapartname">Select Apartment</label>
                            <select name="apartid" class="form-control" placeholder="Name" id="apartname">
                                <?php //foreach ($apartment as $apart) {  ?> 
                                    <!--<option value="<?php // echo $apart->id;    ?>"><?php // echo $apart->name;    ?></option>-->
                                <?php //}  ?>
                            </select> 
                        </div>

                        <div class="col-md-3 vvv">
                            <label id ="labelroomname">Select Room</label>
                            <select name="roomid" class="form-control" placeholder="Name" id="roomname">
                                <?php foreach ($room as $roo) { ?> 
                                    <option value="<?php echo $roo->id; ?>"><?php echo $roo->name; ?></option>
                                <?php } ?>
                            </select> 
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                    <th style="width: 10px">S.No</th>
                                    <th>Task</th>
                                    <th>options</th>
                                    <th>Assign (Sub Contractor)</th>
                                    <!--<th>Stage</th>-->
                                    <th style="width:150px;">More Info/History</th>
                                </tr>
                                <?php
                                $kk = 0;
                                foreach ($task as $index => $tas):

                                    $kk++;
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?= h($tas->name) ?></td>
                                        <td class="text-center">
                                        <!--<div class="btn-group ">-->

                                            Yes <input type ="radio" id="<?php echo $tas->id ?>" value="1" class="tog" name="radio[<?php echo $kk; ?>][change]" <?php
                                            if (!empty($tas['add_tasks'])) {
                                                foreach ($tas['add_tasks'] as $sta) {
                                                    if ($sta['properties_id'] == $property[0]['id']) {
                                                        echo "checked";
                                                    }
                                                }
                                            }
                                            ?>>
                                            No  <input type ="radio" id="<?php echo $tas->id ?>" value="0" class="tog" name="radio[<?php echo $kk; ?>][change]">
                                            <input type="hidden" value="<?php echo $tas->id ?>" name="radio[<?php echo $kk; ?>][taskid]">

                                        </td>
                                                <td>
                                                    <select  name="radio[<?php echo $kk; ?>][subid]" class="form-control" placeholder="Name" id="subname">
                                                        <option value="">Select Sub Contractor</option>

                                                        <?php foreach ($subcontractor as $sub) { ?> 
                                                            <option value="<?php echo $sub->id; ?>" <?php
                                                            if (!empty($tas['add_tasks'])) {
                                                                foreach ($tas['add_tasks'] as $stass) {
                                                                    if ($stass['properties_id'] == $property[0]['id'] && $stass['users_id'] == $sub->id) {
                                                                        echo"selected";
                                                                    }
                                                                }
                                                            }
                                                            ?> ><?php echo $sub->name; ?></option>
                                                                <?php } ?>
                                                    </select> 
                                                    <input type="hidden" value="<?php echo $tas->id; ?>" name="radio[<?php echo $kk; ?>][taskid]">
                                                </td>

                                                <?php
                                                if (!empty($tas['add_tasks'])) {
                                                    foreach ($tas['add_tasks'] as $sta) {
                                                        if ($sta['properties_id'] == $property[0]['id']) {
                                                            ?>
                                                            <td class="text-center hh" id="<?php echo $tas->id; ?>">
                                                                <a href="<?php echo $this->Url->build('/addtasks/moreinfo/' . $tas->id . '/' . $property[0]['id'] . '/' . $sta['id']); ?>" class="btn btn-info btn-block btn-sm"><i class="fa fa-plus"></i> &nbsp; More Info</a>
                                                                <a href=" <?php echo $this->Url->build('/addtasks/history/' . $tas->id . '/' . $property[0]['id'] . '/' . $sta['id']); ?>" class="btn btn-block btn-primary btn-sm"> History</a>
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                    </tr>
                                    <?php
//                            $i++;
                                endforeach;
                                ?>

                            </tbody></table>
                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="box-footer">
                    <?= $this->Form->button(__('Submit')); ?>
                    <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</section>
<script>
    //alert("gdsf");
    $(document).ready(function () {
        $('#floorname').hide();
        $('#labelfloorname').hide();
        $('#labelapartname').hide();
        $('#labelroomname').hide();
        $('#apartname').hide();
        $('#roomname').hide();

        $('.tt').removeClass("btn btn-default btn-sm rad");
        $('.tt').addClass("btn btn-success btn-sm rad");
        $('.tt1').removeClass("btn btn-success btn-sm rad");
        $('.tt1').addClass("btn btn-default btn-sm rad");
//        $('.opt').change(function(){ 
//                  console.log($(this).attr("data-id"));
//                var button_texts = $(this).text();
//                 console.log(button_texts);
//               
//           }   
        $('.rad').click(function () {

            console.log($(this).attr("data-id"));
            var ids = $(this).attr("data-id");
            var proids = $(this).attr("pro-id");
            var button_text = $(this).text();
            console.log(button_text);
            if (button_text == 'No') {
                $('#btn2' + ids).removeClass("btn btn-default btn-sm radios");
                $('#btn2' + ids).addClass("btn btn-success btn-sm radios");
                $('#btn2' + ids).attr("name", "selected" + ids);
                $('#btn1' + ids).removeClass("btn btn-success btn-sm radios");
                $('#btn1' + ids).addClass("btn btn-default btn-sm radios");
                $('#' + ids).hide();
                $.ajax({
                    method: 'POST',
                    data: {taskid: ids,
                        propertiesid: proids,
                        taskstatus: 0},
                    url: 'http://babita.gangtask.com/apartment/addtasks/addtask',
                }).then(function successCallback(response) {
                    console.log("babita");
                    console.log(response);
                    console.log(JSON.parse(response));
                    var res = JSON.parse(response);
                    $("#floorname").empty();
                    $('#floorname').show();
                    $('#labelfloorname').show();
                    $("#floorname").append("<option value=''>Select Floor</option>");
                    $.each(res.data, function (index, value) {
                        $("#floorname").append("<option value='" + index + "'>" + value + "</option>");
                    });

                }, function errorCallback(error) {
                    console.log(error);
                });
            } else {
                $('#btn1' + ids).removeClass("btn btn-default btn-sm radios");
                $('#btn1' + ids).addClass("btn btn-success btn-sm radios");
                $('#btn2' + ids).removeClass("btn btn-success btn-sm radios");
                $('#btn2' + ids).addClass("btn btn-default btn-sm radios");
                $('#' + ids).show();
                $.ajax({
                    method: 'POST',
                    data: {taskid: ids,
                        propertiesid: proids,
                        taskstatus: 1},
                    url: 'http://babita.gangtask.com/apartment/addtasks/addtask',
                }).then(function successCallback(response) {
                    console.log("babita");
                    console.log(response);
                    console.log(JSON.parse(response));
                    var res = JSON.parse(response);
                    $("#floorname").empty();
                    $('#floorname').show();
                    $('#labelfloorname').show();
                    $("#floorname").append("<option value=''>Select Floor</option>");
                    $.each(res.data, function (index, value) {
                        $("#floorname").append("<option value='" + index + "'>" + value + "</option>");
                    });

                }, function errorCallback(error) {
                    console.log(error);
                });

            }
        });


        $('#buildname').change(function () {
            $('#floorname').hide();
            $('#apartname').hide();
            $('#roomname').hide();
            $('#labelfloorname').hide();
            $('#labelapartname').hide();
            $('#labelroomname').hide();
            var selectedrole = $(this).val();
            // alert(selectedrole); 
            if (selectedrole == '') {
                $('#floorname').hide();
                $('#labelfloorname').hide();
            } else {
                $.ajax({
                    method: 'POST',
                    data: {buildingid: selectedrole},
                    url: 'http://babita.gangtask.com/apartment/properties/seachfloor',
                }).then(function successCallback(response) {
                    console.log("babita");
                    console.log(response);
                    console.log(JSON.parse(response));
                    var res = JSON.parse(response);
                    $("#floorname").empty();
                    $('#floorname').show();
                    $('#labelfloorname').show();
                    $("#floorname").append("<option value=''>Select Floor</option>");
                    $.each(res.data, function (index, value) {
                        $("#floorname").append("<option value='" + index + "'>" + value + "</option>");
                    });

                }, function errorCallback(error) {
                    console.log(error);
                });
            }

        });
        $('#floorname').change(function () {
            var selected = $(this).val();
            //alert(selected); 
            if (selected == '') {
                $('#apartname').hide();
                $('#labelapartname').hide();
            } else {
                $.ajax({
                    method: 'POST',
                    data: {floorid: selected},
                    url: 'http://babita.gangtask.com/apartment/properties/searchapartment',
                }).then(function successCallback(response) {
                    console.log("babita");
                    console.log(response);
                    console.log(JSON.parse(response));
                    var res = JSON.parse(response);
                    $("#apartname").empty();
                    if (res['data'].length == 0) {
//                    alert("if");
                        $('#apartname').hide();
                        $('#labelapartname').hide();
                    } else {
//                    alert("else");
                        $('#apartname').show();
                        $('#labelapartname').show();
                        $("#apartname").append("<option value=''>Select Apartment</option>");
                        $.each(res.data, function (index, value) {
                            $("#apartname").append("<option value='" + index + "'>" + value + "</option>");
                        });
                    }


                }, function errorCallback(error) {
                    console.log(error);
                });
            }

        });
        $('#apartname').change(function () {
            var selectedvall = $(this).val();
            // alert(selectedvall); 
            if (selectedvall == '') {
                $('#roomname').hide();
                $('#labelroomname').hide();
            } else {
                $.ajax({
                    method: 'POST',
                    data: {apartmentid: selectedvall},
                    url: 'http://babita.gangtask.com/apartment/properties/searchroom',
                }).then(function successCallback(response) {
                    console.log("babita");
                    console.log(response);
                    console.log(JSON.parse(response));
                    var res = JSON.parse(response);
                    $("#roomname").empty();
                    if (res['data'].length == 0) {
//                    alert("if");
                        $('#roomname').hide();
                        $('#labelroomname').hide();
                    } else {
//                    alert("else");
                        $('#labelroomname').show();
                        $('#roomname').show();
                        $("#roomname").append("<option value=''>Select Room</option>");
                        $.each(res.data, function (index, value) {
                            $("#roomname").append("<option value='" + index + "'>" + value + "</option>");
                        });
                    }


                }, function errorCallback(error) {
                    console.log(error);
                });
            }

        });
//     $("#addpropertytask").submit(function(){
//        alert("Submitted");
//        console.log($(this).val());
//    });


    });</script>
<!--<td>
    <select  name="radio[<?php // echo $kk;    ?> ][stageid]" class="form-control" placeholder="Name" id="stagename">
    <option value="">Select Stage</option>
<?php //foreach ($stage as $sta) {  ?> 
      <option value="<?php //echo $sta->id;  ?>"  <?php
//if(!empty($tas['add_tasks'])){
///   foreach ($tas['add_tasks'] as $stas) { 
// if($stas['properties_id']== $property[0]['id'] && $stas['stages_id']== $sta->id){ echo"selected"; }}} 
?>//><?php // echo $sta->name;    ?></option>
<?php // }   ?>
    </select> 
    <input type="hidden" value="<?php // echo $tas->id;     ?>" name="radio[<?php //echo $kk; ?>][taskid]">                 
    </td>-->