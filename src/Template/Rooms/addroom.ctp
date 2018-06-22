<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<section class="content-header">
    <h1>
        Add Room
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">add room</li>
    </ol>
</section>

<!-- Main content -->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill Details</h3>
                </div>
                <div class="box-body">
                    <?= $this->Form->create($room) ?>

                    <?php
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Room Name',
                        'options' => [1,2,3,4,5,6,7],
                        'class' => 'form-control',
                        'placeholder' => 'Enter Room',
                        'empty' => 'Select Room'
                    ]);
                    ?>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <?php echo $this->Form->button(__('Submit')); ?>
                </div>
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
