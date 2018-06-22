<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor $floor
 */
?>
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Floor Details</h3>
                </div>
                <div class="box-body">
                   <?php echo $this->Form->create($floor);
                 //   foreach ($floor as $key=>$value) {
                 //       echo "{$key} => {$value} "; exit;
                   ?>
                    <?php
                     //echo "<pre>";   print_r($floor); echo "</pre>";
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Floor Name',
                        'class' => 'form-control',  
                        'placeholder' => 'Enter Floor Name'
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
                      echo $this->Html->link(__('Add Floor'), ['controller' => 'floors', 'action' => 'addfloor', $floor->building->id]); 
                       // if(!empty($value->apartments)){
                      //  echo $this->Html->link(__('Edit Apartments'), ['controller' => 'apartments','action' => 'edit', $value['id']]);
                      //   } 
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
