<body class="hold-transition skin-blue sidebar-mini">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add more Information
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Properties</a></li>
            <li class="active">Add more Information </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content content2">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
                <!-- general form elements -->

                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    echo $this->Form->create($checktask, ['id' => 'moreinfo',
                        'type' => 'file']);
                    ?>

                    <div class="box-header with-border">
                        <h3 class="box-title">  Add details </h3>
                    </div>

                    <div class="box-body">
                        <?php if(!empty($filldetail)){ ?>
                        <div>
                        <?php
                        echo $this->Form->control('repair', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group fullinput">{{content}}</div>'
                            ],
                            'label' => 'Repair',
                            'class' => 'col-sm-4 control-label'
                        ]);
                        ?>
                        <?php
                        echo $this->Form->control('repairsize', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group fullinput">{{content}}</div>'
                            ],
                            'label' => 'Repair Size',
                            'class' => 'col-sm-4 control-label'
                        ]);
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Repair<a class="add_icn">Add Field<i class="fa fa-plus"></i></a></label>            
                        </div>
                        </div>
                        <?php }else{
                            echo 'hello';
                        }
                         ?>
                        <?php
                        foreach ($image as $addtaskinfos) {
                            ?>
                            <div id="filediv" style="display: block;"><div id="abcd2" class="abcd"><div class="abcd2img"><img id="previewimg2" src="<?php echo $this->request->getAttribute("webroot") . 'task_dir' . '/' . $addtaskinfos['image']; ?>">
                                    </div>
                                </div></div>
                            <?php }
                        ?>
                        <?php
                        echo $this->Form->control('how_many', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group fullinput">{{content}}</div>'
                            ],
                            'label' => 'How Many',
                            'class' => 'col-sm-4 control-label',
                            'type' => 'Number'
                        ]);
                        ?>
                        <?php
                        echo $this->Form->control('file[]', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'class' => 'form-control',
                            'type' => 'file',
                            'id' => 'file',
                            'label' => 'Add Photos',
                            'multiple' => true,
                        ]);
                        ?>
                    </div>
                    <?php
                    echo $this->Form->control('comment', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group fullinput">{{content}}</div>'
                        ],
                        'label' => 'Comments',
                        'class' => 'col-sm-4 control-label',
                        'type' => 'textarea'
                    ]);
                    ?>

                </div>
                <input type="button" id="add_more" class="upload" value="Add More Files"/>
                <div class="box-footer">
                    <?php
                    echo $this->Form->button(__('Submit', array(
                        'class' => 'btn btn-primary',
                        'id' => 'upload',
                        'name' => 'submit'
                    )));
                    ?>
                    <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                </div>
                <!-- /.box-body -->
                <?php echo $this->Form->end(); ?>  
            </div>    
            <!-- /.box -->
            <!-- Form Element sizes -->
       </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- ./wrapper -->
<script>
//    alert("check");
//    var abc = 0;      // Declaring and defining global increment variable.
//    $(document).ready(function () {
//        alert("h")
//        alert("ffh");
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
//        $('#add_more').click(function () {
//            alert("here");
//            $(this).before($("<div/>", {
//                id: 'filediv'
//            }).fadeIn('slow').append($("<input/>", {
//                name: 'file[]',
//                type: 'file',
//                id: 'file'
//            }), $("<br/><br/>")));
//        });
//    }
</script>

