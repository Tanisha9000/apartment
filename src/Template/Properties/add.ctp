<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<section class="content-header">
    <h1>
        Set up Properties
        <small style="display:block; margin-top:10px;">Fill Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active">Set up Properties </li>
    </ol>
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->  
        <div class="col-md-10">
            <div id="errmsg" style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; color: #a94442; background-color: #f2dede; border-color: #ebccd1; display:none; ">Please fill all the details</div>
            <?php
            echo $this->Form->create($property, array(
                'id' => 'addproperty'
                    )
            );
            ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Job site</h3>
                </div>
                <?php
                //  echo "<pre>";        print_r($apartmanager); echo "</pre>";
// exit; 
                ?>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">

                    <?php
                    echo $this->Form->control('jobsitename', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Name'
                    ]);
                    ?>
                    <div class="form-group">
                        <?php
                        echo $this->Form->control('jobsiteaddress', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Address',
                            'class' => 'form-control',
                            'type' => 'textarea',
                            'placeholder' => 'Enter Address...'
                        ]);
                        ?>
                    </div>
                </div>

                <!--</div> -->
                <!-- /.box-body -->

                <div class="box-header with-border">
                    <h3 class="box-title">Billing</h3>
                </div>
                <div class="box-body">          

                    <div class="form-group">
                        <?php
                        echo $this->Form->control('billingname', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Name'
                        ]);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $this->Form->control('billingaddress', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Address',
                            'class' => 'form-control',
                            'type' => 'textarea',
                            'placeholder' => 'Enter Address...'
                        ]);
                        ?>
                    </div>
                <button type="button" id="billingmodal" class="btn btn-default pull-right" data-toggle="modal" data-target="#Mymodal">
                        Billing Terms
                </button> 

                </div>
                <!-- /.box-body -->
                <div class="box-header with-border">
                    <h3 class="box-title">Property / Maintenance Manager </h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <select name="name_id" class="form-control valid" placeholder="Name" id="apmanagname" aria-invalid="false">
                            <option value="">Select Property Manager</option>
                            <?php foreach ($apartmanager as $apartmanage) { ?> 
                                <option value="<?php echo $apartmanage->id; ?>"><?php echo $apartmanage->name; ?></option>
                            <?php } ?>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="apartemail" placeholder="Email Address" readonly>
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">Phone</label>
                        <input type="tel" class="form-control" id="apartphone" placeholder="Phone Number" readonly>
                    </div> 

                    <a href="<?php echo $this->Url->build('/users/add_apartment_manager'); ?>" type="button"  class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New</a>         	

                </div>
                <!-- /.box-body -->

                <div class="box-header with-border">
                    <h3 class="box-title"> General Contractor </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <select name="gen_id" class="form-control valid" placeholder="Name" id="generalcont">
                            <option value="">Select General Contractor</option>
                            <?php foreach ($generalcont as $gencon) { ?> 
                                <option value="<?php echo $gencon->id; ?>"><?php echo $gencon->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">  
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="generalemail" placeholder="Email Address" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="tel" class="form-control" id="generalphone" placeholder="Phone Number" readonly>
                    </div>

                    <a href="<?php echo $this->Url->build('/users/add_general_contractor'); ?>" type="button"  class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New</a>

                </div>
                <!-- /.box-body -->
                <div class="sbmtbtn">
                    <?= $this->Form->button(__('Submit')); ?></div>
                <?= $this->Form->end() ?>
                <div id="togg" style="display:none">
                    <!--  -->
                    <div class="box-header with-border">
                        <h3 class="box-title">  layout of property </h3>
                    </div>
                    <div class="box-body">              
                        <div class="">

                            <!--  <div class="form-group fullinput">
                            <h3 class="col-sm-12 control-label" style="padding:0; color:#3c8dbc;">Building Number 1</h3>
                            </div>-->

                            <div class="box-group" id="accordion"><!--one-->
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="">
                                    <div class="box-header with-border">
                                        <h4 class="box-title form-group fullinput" style="margin: 0;">
                                            <a data-toggle="collapse" style="color:#fff" data-parent="#accordion" href="#collapsefour4">
                                                <h3 class="col-sm-12 control-label" style="text-decoration: none; padding:0; color:#3c8dbc; margin:0px;    background: #3c8dbc; padding: 7px 15px; color: white;">Building 
                                                    <a id="openbuilding" type="button" style="color:#3c8dbc; background:#fff;" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New</a>
                                                </h3>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapsefour4" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group fullinput">
                                                <div class="panel box box-primary" id="maincontent">
                                                    <div class="box-header with-border">

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Name</label>
                                                            <input type="text" class="form-control" id="buildingname" name="building[0][name]" placeholder="Enter Name">
                                                        </div>
                                                        <a data-toggle="collapse" href="" type="button" style="color:#3c8dbc; background:#fff;float:right;" class="btn btn-primary pull-right" id="buildingsave">Save</a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div id="collapseOne1" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="outer">
                                                <div class="panel box box-primary">
                                                    <div class="box-header with-border">

                                                        <a data-toggle="collapse" data-parent="#accordion" href="#floorhide" aria-expanded="false" class="collapsed">
                                                            <div class="form-group fullinput" style="    margin: 0;">
                                                                <label for="inputFloor" class="col-sm-4 control-label" style="padding:7px 0; margin-bottom:0;color:#000; cursor: pointer;">Floor</label>

                                                                <a id="openfloor" type="button" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> &nbsp; Add New</a>
                                                        </a>
                                                        <div id="list-build"></div>
                                                    </div>
                                                    <!-- </a> -->
                                                    <div id="floorhide" class="collapse">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Name</label>
                                                            <input type="text" class="form-control" id="floorname" placeholder="Enter Name">
                                                        </div>
                                                        <a data-toggle="collapse" href="" type="button" style="color:#3c8dbc; background:#fff;float:right;" class="btn btn-primary pull-right" id="floorsave">Save</a>
                                                    </div>          
                                                </div>


                                                <div id="collapseTwo2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="box-body">
                                                        <div class="form-group fullinput">


                                                            <div class="panel box box-primary">
                                                                <div class="box-header with-border">

                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#aparthide" aria-expanded="false" class="collapsed">
                                                                        <div class="accorian-back">
                                                                            <label for="inputFloor" class="col-sm-4 control-label" style="padding:7px 0; margin-bottom:0;color:#000; cursor: pointer;">Apartment</label>

                                                                            <a id="openapartment"  type="button" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> Add New</a>
                                                                            <div id="list-floor"></div> 
                                                                            <div id="list-f1"></div>
                                                                        </div>
                                                                    </a>
                                                                    <div id="aparthide" class="collapse">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Name</label>
                                                                                    <input type="text" class="form-control" id="apartmentname" placeholder="Enter Name">
                                                                                </div>
                                                                                <a data-toggle="collapse" href="" type="button" style="color:#3c8dbc; background:#fff;float:right;" class="btn btn-primary pull-right" id="apartmentsave">Save</a>
                                                                            </div> 																	
                                                                </div>


                                                                <div id="collapseThree3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                    <div class="box-body">
                                                                        <div class="inner">
                                                                            <div class="box01 form-group">
                                                                                
                                                                                <div class="col-md-12">
                                                                                    <div class="fff">Select no of rooms:-
                                                                                    <div id="list-apart"></div>
                                                                                    <div id="list-a1"></div>
                                                                                    <div id="list-a2"></div>
                                                                                    </div>
                                                                  
																					
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="btn-group radio_box" data-toggle="buttons">

                                                                                        <label class="btn btn-default active">
                                                                                            <input type="radio" name="options" id="roomno" value="1" autocomplete="off" chacked>
                                                                                            1
                                                                                        </label>

                                                                                        <label class="btn btn-default">
                                                                                            <input type="radio" name="options" id="roomno" value="2" autocomplete="off">
                                                                                            2
                                                                                        </label>

                                                                                        <label class="btn btn-default">
                                                                                            <input type="radio" name="options" id="roomno" value="3" autocomplete="off">
                                                                                            3
                                                                                        </label>

                                                                                        <label class="btn btn-default">
                                                                                            <input type="radio" name="options" id="roomno" value="4" autocomplete="off">
                                                                                            4
                                                                                        </label>

                                                                                        <label class="btn btn-default">
                                                                                            <input type="radio" name="options" id="roomno" value="5" autocomplete="off">
                                                                                            5
                                                                                        </label>

                                                                                        <label class="btn btn-default">
                                                                                            <input type="radio" name="options" id="roomno" value="6" autocomplete="off">
                                                                                            6
                                                                                        </label>


                                                                                    </div>
                                                                                </div>
                                                                                <!--   <a type="button" style="color:#3c8dbc; background:#fff; display:none" class="btn btn-primary" id="addtask">Add Task</a>-->

                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>                                                     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="adtk">  <a type="button" style="color:#fff;  background: #3c8dbc !important; display:none; border:none;  padding: 9px 50px;" class="btn btn-primary" id="addtask">Submit</a></div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--one close-->

            </div>
        </div>
    </div>

</div>


<!--box-body -->

<!-- Form Element sizes -->


<!--col (left) -->
<!-- right column -->

<!--col (right) -->

<!--row -->
</section>
<!--content -->
<div class="modal fade" id="Mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Terms</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreebilling">Agree</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<style>
    .fullinput{
        border-bottom: 1px solid #f4f4f4;
    }

    .adtk{
        float:right;
    }

    .sbmtbtn{
        margin-left:10px;
        margin-bottom:10px;
        float:left;
        width:100%;
    }

    .box.box-primary{
        float:left;
        width:100%;
    }
    .box-body .fullinput{
        margin:0px;
        border:none;
    }
    .box-body .fullinput .panel.box.box-primary{
        margin:0px;
        border:none;
        box-shadow:none;
    }
    .box-body .fullinput .panel.box.box-primary .with-border{
        border:none;
    }
    .fff #list-apart label{
        font-size: 14px;
        color:#444;
    }
    #accordion .box-header.with-border h3 a{
        text-decoration: none !important;
    }
    #list-floor{
        width:100%;
        float:left;
    }
    #list-floor select.form-control{
        width:49%;
        float:left;
        margin-bottom: 5px;
    }
    #list-floor select.form-control:nth-child(even){
        float:right;
    }
    #list-f1{
        width:100%;
        float:left;        
    }
    #list-f1 select.form-control{
        width:49%;
        float:left;
        margin-bottom: 5px;
    }
    #list-f1 select.form-control:nth-child(even){
        float:right;
    }
    #list-apart{
        width:100%;
        float:left;
        display: flex;
    }
    #list-apart select.form-control{
        width:30%;
        float:left;
        margin-bottom: 5px;
        margin-right: 15px;
    }
    #list-apart select.form-control.center{
        float:none;
        margin:auto;
    }
    #list-apart select.form-control:nth-child(3){
        float:right;
    }
    #list-a1{
        width:100%;
        float:left;
        display: flex;
    }
    #list-a1 select.form-control{
        width:30%;
        float:left;
        margin-bottom: 5px;
        margin-right: 15px;
    }
    #list-a1 select.form-control.center{
        float:none;
        margin:auto;
    }
    #list-a1 select.form-control:nth-child(3){
        float:right;
    }
        #list-a2{
        width:100%;
        float:left;
        display: flex;
    }
    #list-a2 select.form-control{
        width:30%;
        float:left;
        margin-bottom: 5px;
        margin-right: 15px;
    }
    #list-a2 select.form-control.center{
        float:none;
        margin:auto;
    }
    #list-a2 select.form-control:nth-child(3){
        float:right;
    }
</style>


<script>
    var randomid;
    var proid;
    var i = 0;
    $("#apmanagname").change(function () {
        var selectedrole = $("#apmanagname option:selected").val();
        //      alert("You have selected - " + selectedrole);
        $.ajax({
            method: 'POST',
            data: {user_id: selectedrole},
            url: 'http://babita.gangtask.com/apartment/properties/addfield',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))
            var res = JSON.parse(response);
            console.log(res.data)
            $("#apartemail").val(res.data.email);
            $("#apartphone").val(res.data.phone);
        }, function errorCallback(error) {
            console.log(error)
        });
    });

    $("#generalcont").change(function () {
        var selectedrole = $("#generalcont option:selected").val();
        //      alert("You have selected - " + selectedrole);
        $.ajax({
            method: 'POST',
            data: {user_id: selectedrole},
            url: 'http://babita.gangtask.com/apartment/properties/addfield',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))
            var res = JSON.parse(response);
            console.log(res.data)
            $("#generalemail").val(res.data.email);
            $("#generalphone").val(res.data.phone);
        }, function errorCallback(error) {
            console.log(error)
        });
    });

    $("#addproperty").submit(function (event) {
//        alert("Handler for .submit() called.");
        var $inputs = $('#addproperty :input');
        var data = $(this).serializeArray();
        var values = {};
        $inputs.each(function () {
            if ($(this).val() != "") {
                values[this.name] = $(this).val();
            }
        });
        console.log(values)
        $.ajax({
            method: 'POST',
            data: {values},
            url: 'http://babita.gangtask.com/apartment/properties/add',
        }).then(function successCallback(response) {
            console.log(JSON.parse(response))
             $("#errmsg").hide();
            var proresponse = JSON.parse(response)

            if (proresponse.status == false) {
                $("#errmsg").show();
                $(window).scrollTop(0);
            } else {
                proid = proresponse.data.id;
                randomid = proresponse.data.id;
                console.log(randomid)
                $("#togg").show();
            }
        }, function errorCallback(error) {
            console.log(error)
        });
        event.preventDefault();
    });

    $("#buildingsave").click(function (event) {
        event.preventDefault();
        console.log('property id' + proid);
        var building = $("#buildingname").val();
        console.log(building); 
        if (building != "") {
            $.ajax({
                method: 'POST',
                data: {building_name: building, id: proid},
                url: 'http://babita.gangtask.com/apartment/buildings/add',
            }).then(function successCallback(response) {
                response = jQuery.parseJSON(response);
                if(response.status ==  true){
                $("#buildingname").val("");
                $("#collapsefour4").hide();
                $("#collapseOne1").show();
                $("#floorhide").show();
//                    if (response.count > 1) {
                        var html = '<label for="exampleInputEmail1">List of Buildings added (Select particular building to add floor in it)</label>'
                        html += '<select class="form-control" placeholder="Name" id="getbuild">'
                        html += '<option value="">Select Buildings</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>';
                        $("#list-build").html(html);
//
//                    } else {
//                        var proresponse = response;
//                        randomid = proresponse.data[0].id;
//                        console.log(randomid);
//                    }
                } else {
                        alert('This Building name already exists in this property')
                }
            }, function errorCallback(error) {
                console.log(error)
            });
        } else {
            alert('Please enter building first')
        }

    });

    $(document).on('change', '#getbuild', function () {
        //    alert('entered')
        var getValue = $(this).val();
        console.log(getValue)
        randomid = getValue;
        $("#collapseOne1").show();
        
    });

    $("#floorsave").click(function () {
        console.log('building id' + randomid);
        if($("#getbuild").val() == ""){
            alert('Please select building first')
        } else {
        var floor = $("#floorname").val();
        if (floor != "") {
            $.ajax({
                method: 'POST',
                data: {building_name: floor, id: randomid ,propertyid : proid},
                url: 'http://babita.gangtask.com/apartment/floors/add',
            }).then(function successCallback(response) {
                console.log(response)
                response = jQuery.parseJSON(response);
                if(response.status == true){
                    $("#floorname").val("");   
                    $("#collapseTwo2").show();
                    $("#floorhide").hide();
                    $("#list-build").hide();
                    $("#getbuild").val("");
                    $("#aparthide").show();
//                    if (response.count > 1) {
                   //     alert('entered')
                        var html = '<select class="form-control" placeholder="Name" id="build">'
                        html += '<option value="">Buildings</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-floor").html(html);
//                        var html = '<label for="exampleInputEmail1">List of Floors added (Select particular floor to add apartment in it)</label>'
//                        html += '<select class="form-control" placeholder="Name" id="getfloor">'
//                        html += '<option value="">Select Floors</option>'
//                        for (var i = 0; i < response.data.length; i++) {
//                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
//                        }
//                        html += '</select>';
//                        $("#list-floor").html(html);

//                    } else {
//                        var proresponse = response;
//                        randomid = proresponse.data[0].id;
//                        console.log(randomid);
//                    }
                }else{
                    alert('This Floor name already exists for this building')
                }
            }, function errorCallback(error) {
                console.log(error)
            });
        } else {
            alert('Please fill the floor field')  
        }
        }
    });
    
    $(document).on('change', '#build', function () {
        var getValue = $(this).val();
        console.log(getValue)
        if(getValue == ""){
            alert('Please select building')
        }else{
            randomid = getValue;
            $.ajax({
                method: 'POST',
                data: {id: randomid},
                url: 'http://babita.gangtask.com/apartment/floors/getfloor',
            }).then(function successCallback(response) {
                console.log(response) 
                response = jQuery.parseJSON(response);  
                        var html = '<select class="form-control" placeholder="Name" id="floor">'
                        html += '<option value="">Floors</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-f1").html(html); 
                
            }, function errorCallback(error) {
                console.log(error)
            });
        }
   
    }); 
     $(document).on('change', '#floor', function () {
        var getValue = $(this).val();
        console.log(getValue)
        randomid = getValue;
    });   
    $(document).on('change', '#getfloor', function () {
        var getValue = $(this).val();
        console.log(getValue)
        randomid = getValue;
        $("#collapseTwo2").show();
      });

    $("#apartmentsave").click(function () {
   //     console.log('floor id' + randomid);
        if($("#floor").val() == "" || $("#build").val() == ""){
            alert('Please select first')
        } else {
            var apartment = $("#apartmentname").val();
            if(apartment != ""){
            $.ajax({
                method: 'POST',
                data: {building_name: apartment, id: randomid,propertyid : proid},
                url: 'http://babita.gangtask.com/apartment/apartments/add',
            }).then(function successCallback(response) {
                console.log(response)
                response = jQuery.parseJSON(response);
                if(response.status == true){
                    $("#apartmentname").val("");
                    $("#aparthide").hide();
                    $("#list-floor").html("");
                    $("#list-f1").html("");
                    $("#collapseThree3").show();
                    $("#floor").val("");
                    $("#build").val("");
                        var html = '<select class="form-control" placeholder="Name" id="apartbuild">'
                        html += '<option value="">Buildings</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-apart").html(html);
//                    if (response.count > 1) {
//                        var html = '<label for="exampleInputEmail1">List of Apartments added (Select particular apartment to add room in it)</label>'
//                        html += '<select class="form-control" placeholder="Name" id="getapart">'
//                        html += '<option value="">Select Apartments</option>'
//                        for (var i = 0; i < response.data.length; i++) {
//                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
//                        }
//                        html += '</select>';
//                        $("#list-apart").html(html);

//                    } else {
//                        var proresponse = response;
//                        randomid = proresponse.data[0].id;
//                        console.log(randomid);
//                    }
                }else{
                      alert('This Apartment name already exists for this floor')
                }
            }, function errorCallback(error) {
                console.log(error)
            });    
            }else{
            alert('Please enter apartment first')
            }
        }
    });
    
    $(document).on('change', '#apartbuild', function () {
        var getValue = $(this).val();
        console.log(getValue)
        if(getValue == ""){
            alert('Please select building')
        }else{
            randomid = getValue;
            $.ajax({
                method: 'POST',
                data: {id: randomid},
                url: 'http://babita.gangtask.com/apartment/floors/getfloor',
            }).then(function successCallback(response) {
                console.log(response) 
                response = jQuery.parseJSON(response);  
                        var html = '<select class="form-control" placeholder="Name" id="apartfloor">'
                        html += '<option value="">Floors</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-a1").html(html); 
                
            }, function errorCallback(error) {
                console.log(error)
            });
        }
   
    });
    
    $(document).on('change', '#apartfloor', function () {
        var getValue = $(this).val();
        console.log(getValue)
        if(getValue == ""){
            alert('Please select floor')
        }else{
            $("#apartment").html("");
            randomid = getValue;
            $.ajax({
                method: 'POST',
                data: {id: randomid},
                url: 'http://babita.gangtask.com/apartment/floors/getapartment',
            }).then(function successCallback(response) {
                console.log(response) 
                response = jQuery.parseJSON(response);  
                        var html = '<select class="form-control" placeholder="Name" id="apartment">'
                        html += '<option value="">Apartments</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-a2").html(html); 
                
            }, function errorCallback(error) { 
                console.log(error)
            });
        }
   
    }); 
    
    $(document).on('change', '#getapart', function () {
        var getValue = $(this).val();
        console.log(getValue)  
        randomid = getValue;
        $("#collapseThree3").show(); 
    });
    $(document).on('change', '#apartment', function () {
        var getValue = $(this).val();
        console.log(getValue)  
        randomid = getValue;
    });

    $('input[name="options"]').on('change', function () {
        if($("#apartment").val() == "" || $("#apartfloor").val() == "" || $("#apartbuild").val()== ""){
            alert("Please select all values")
        } else {
        var roomno = $(this).val();
        console.log(roomno)
        $.ajax({
            method: 'POST',
            data: {building_name: roomno, id: randomid},
            url: 'http://babita.gangtask.com/apartment/rooms/add',
        }).then(function successCallback(response) {
            console.log(response)
            $("#apartfloor").val("");
            $("#apartbuild").val("");
            $("#addtask").show();
            $("#apartment").val("");
        }, function errorCallback(error) {
            console.log(error)
        });
    }
    });

    $("#addtask").click(function () {
        window.location.href = "http://babita.gangtask.com/apartment/properties/index/";
    });

    $("#openbuilding").click(function () {
        $("#collapsefour4").show();
    });

    $("#openfloor").click(function () {
        $("#floorhide").show();
        $("#list-build").show();

        $.ajax({
            method: 'POST', 
            data: {id: proid},
            url: 'http://babita.gangtask.com/apartment/properties/getbuilding',
        }).then(function successCallback(response) {
            response = jQuery.parseJSON(response);
            $("#collapsefour4").hide(); 
            $("#collapseOne1").show();   
            if (response.count > 1) {  
                var html = '<label for="exampleInputEmail1">List of Buildings added (Select particular building to add floor in it)</label>'
                html += '<select class="form-control" placeholder="Name" id="getbuild">'
                html += '<option value="">Select Buildings</option>'
                for (var i = 0; i < response.data.length; i++) {
                    html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                }
                html += '</select>';
                $("#list-build").html(html);

            } else {
                var proresponse = response;
                randomid = proresponse.data[0].id;
                console.log(randomid);
            }

        }, function errorCallback(error) {
            console.log(error)
        });

    });

    $("#openapartment").click(function () {
        $("#aparthide").show();
        $.ajax({
                method: 'POST',
                data: {propertyid : proid},
                url: 'http://babita.gangtask.com/apartment/properties/getfloor',
        }).then(function successCallback(response) {
            response = JSON.parse(response);
            console.log(response);
                        var html = '<select class="form-control" placeholder="Name" id="build">'
                        html += '<option value="">Buildings</option>'
                        for (var i = 0; i < response.data.length; i++) {
                            html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                        }
                        html += '</select>'; 
                        $("#list-floor").html(html);

        }, function errorCallback(error) {
            console.log(error)
        });

    });
    
    $("#billingmodal").click(function (event) {
    event.preventDefault();
            $.ajax({
                method: 'GET',
                url: 'http://babita.gangtask.com/apartment/properties/billingterms',
        }).then(function successCallback(response) {
            response = JSON.parse(response);
            console.log(response);
            console.log(response.data[0].description)
            $("#Mymodal .modal-body").html(response.data[0].description);
            $("#Mymodal").modal();
        }, function errorCallback(error) {
            console.log(error)
        });
        
    });
    
    $("#agreebilling").click(function (){
        $('#myModal').modal('hide')
    });
    
</script>
