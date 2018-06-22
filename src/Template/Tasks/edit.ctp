<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <!-- <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?></li>
    </ul> -->
</nav>


    <!-- Main content -->
    <section class="content content2">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">Edit Task </h3>
            </div>
              <div class="box-body">
                       <?= $this->Form->create($task) ?>
		  <?php echo $this->Form->control('id',[
				  'templates' => [
        'inputContainer' => '<div class="form-group">{{content}}</div>'
    ],
                        'label' => 'Task Name',
                    'class' => 'form-control',
                    'type' => 'hidden',
		    'value' => $task->id,
	]); ?>
                        <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Task Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Name',
                             'value' => $task->name,
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
