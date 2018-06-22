<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addtask $addtask
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $addtasks
 */
?>
<section class="content-header">
    <h1>
        Add Photos
        <small>Fill Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Task</a></li>
        <li class="active">Add Photos </li>
    </ol>
</section>

<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <?php
            foreach ($image as $taskimg) {
                ?>
                <div id="filediv" style="display: inline-block; width:150px; height:150px;"><div id="abcd2" class="abcd"><div class="abcd2img"><img id="previewimg2" style="width:100%; min-height:150px;" src="<?php echo $this->request->getAttribute("webroot") . 'upload_dir' . '/' . $taskimg['image']; ?>">
                        
                            <?=
                            $this->Form->postLink(
                                    __('X'), ['controller' => 'images', 'action' => 'deleteimage/', $taskimg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskimg->id)]
                            )
                            ?></div>

                    </div>
                </div>
                <?php
            }
            echo $this->Form->create($addtask, [
                'type' => 'file', 'required' => true]);
            ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body" id="container">

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

                    <?php
                    echo $this->Form->button(__('Submit', array(
                        'class' => 'upload',
                        'id' => 'upload',
                        'name' => 'submit'
                    )));
                    ?>
                    <!-- /.box-body -->

                </div> 
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->

<?php echo $this->Form->end(); ?>
        </div>

    </div>

<!--row -->
</section>

<script>
//    alert("check");
    var abc = 0;      // Declaring and defining global increment variable.
    $(document).ready(function () {
//        alert("ffh");
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
        $('#add_more').click(function () {
//            alert("here");
            $(this).before($("<div/>", {
                id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
                name: 'file[]',
                type: 'file',
            }), $("<br/><br/>")));
        });
    });
</script>
<style type="text/css">
    .abcd2img a {
        position: absolute;
        left: auto;
        top: 0px;
        color: #fff;
        background-color: #e80202f0;
        padding: 1px 5px;
        border-radius: 5px;
        right: 0;
    }
</style>
<!--<script>
    setTimeout(function () {
        $("div.alert").remove();
    }, 5000); // 5 secs

</script>-->


