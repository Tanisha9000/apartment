<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Building $building
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Actions') ?></li>
        <li><?//= $this->Form->postLink(
              //  __('Delete'),
             //   ['action' => 'delete', $building->id],
             //   ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)])
        ?></li>
        <li><?//= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?></li>
        <li><?//= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?//= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<!-- <div class="buildings form large-9 medium-8 columns content">
    <?//= $this->Form->create($building) ?>
    <fieldset>
        <legend><?//= __('Edit Building') ?></legend>
        <?php
           // echo $this->Form->control('name');
           // echo $this->Form->control('properties_id', ['options' => $properties]);
        ?>
    </fieldset>
    <?//= $this->Form->button(__('Submit')) ?>
    <?//= $this->Form->end() ?>
</div> -->

<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Building Details</h3>
                </div>
                <div class="box-body">
                   <?php echo $this->Form->create($building);
            //        foreach ($building as $key=>$value) {
                 //       echo "{$key} => {$value} "; exit;
                   ?>
                    <?php
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Building Name',
                        'class' => 'form-control',  
                        'placeholder' => 'Enter Building Name'
                    ]);
                    
                    ?>
                    <?php
                     echo $this->Html->link(__('Add Building'), ['controller' => 'buildings', 'action' => 'addbuilding',$building->property->id]);
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
