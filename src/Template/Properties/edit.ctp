<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Property Details</h3>
                </div>
                <div class="box-body">
                   <?=
                    $this->Form->create($property)
                   ?>
                    <?php
            //        echo $this->Form->control('jobsitename');
                    echo $this->Form->control('jobsitename', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Job Site Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Job Site Name'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('jobsiteaddress', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Job Site Address',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Job Site Address'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('billingname', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Billing Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Billing Name'
                    ]);
                    ?>
                    <?php
                    echo $this->Form->control('billingaddress', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Billing Address',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Billing Address'
                    ]);
                    ?>

                </div>
                <!-- /.box-body -->
                
                <div class="box-footer">
                     <?php echo $this->Form->button(__('Submit')); ?>
                    <?php  if(count($building) != 0) { 
                       echo  $this->Html->link(__('List Buildings'), ['controller' => 'buildings','action' => 'index', $property->id]);
                    } else{
                       echo  $this->Html->link(__('Add Buildings'), ['controller' => 'buildings','action' => 'addbuilding', $property->id]); 
                    }
                    ?>
                </div>
                
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>



