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
        Add Notes
        <small>Fill Information</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Tasks</a></li>
        <li class="active">Add Notes </li>
    </ol>
</section>


<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <?php
            echo $this->Form->create($addtask)
            ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body" id="container">

                    <?php
                    echo $this->Form->control('subcontnotes', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Add Notes',
                        'class' => 'form-control',
                        'type' => 'textarea'
                    ]);
                    ?>


                      <?php echo $this->Form->button(__('Submit')); ?>
                    <!-- /.box-body -->

                   

                </div>

            </div>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>

</div>
<!--box-body -->

<!-- Form Element sizes -->

</div>
<!--col (left) -->
<!-- right column -->

<!--col (right) -->
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
<script>
    setTimeout(function () {
        $("div.alert").remove();
    }, 5000); // 5 secs

</script>


