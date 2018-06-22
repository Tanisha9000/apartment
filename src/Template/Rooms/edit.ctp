<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Room Details</h3>
                </div>
                <div class="box-body">
                    <?php
                    echo $this->Form->create($room);
                 //   foreach ($room as $key => $value) {
                        //       echo "{$key} => {$value} "; exit;
                        ?>
                        <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'class' => 'form-control',
                            'options' => [1,2,3,4,5,6,7],
                        ]);
                        ?>
                        <?php
                         echo $this->Html->link(__('Add Room'), ['controller' => 'rooms', 'action' => 'addroom', $room->apartment->id]); 
//                        echo $this->Form->control('id', [
//                            'templates' => [
//                                'inputContainer' => '<div class="form-group">{{content}}</div>'
//                            ],
//                            'class' => 'form-control',
//                            'type' => 'hidden',
//                            'name' => "data[$key][id]",
//                            'value' => $value['id']
                     //   ]);
                        ?>
                    <?php // } ?>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?php echo $this->Form->button(__('Submit')); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
