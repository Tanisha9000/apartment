<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
    <!-- Main content -->
    <section class="content content2">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">Edit Stage</h3>
            </div>
            <?= $this->Form->create($stage) ?>
              <div class="box-body">
                 
                            <?php echo $this->Form->control('id',[
                                'templates' => [
                              'inputContainer' => '<div class="form-group">{{content}}</div>'
                          ],
                                          'label' => 'Task Name',
                                          'class' => 'form-control',
                                          'type' => 'hidden',
                              'value' => $stage->id,
                        ]); ?>
                        <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Stage Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Name',
                             'value' => $stage->name,
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
