<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
?>
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Apartment Details</h3>
                </div>
                <div class="box-body">

                   <?php 
                  // echo "<pre>"; print_r($room); echo "</pre>";
                   
                   echo $this->Form->create($apartment);
                //    foreach ($apartment as $key=>$value) {
                   ?>
                    <?php
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Apartment Name',
                        'class' => 'form-control',  
                        'placeholder' => 'Enter Apartment Name'
                    ]);
                    
                    ?>
                    <?php
//                     echo $this->Form->control('id', [
//                        'templates' => [
//                            'inputContainer' => '<div class="form-group">{{content}}</div>'
//                        ],
//                        'class' => 'form-control',
//                        'type' => 'hidden',
//                        'name' => "data[$key][id]",
//                        'value'=> $value['id']
//                     ]);
                    
                    ?>
                    <?php
                    echo $this->Html->link(__('Add Apartment'), ['controller' => 'apartments', 'action' => 'addapartment', $apartment->floor->id]); 
                    //    if(!empty($value->rooms)) {
//                        echo $this->Html->link(__('Edit Rooms'), ['controller' => 'rooms','action' => 'edit', $value['id']]) ;
//                     } 
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
