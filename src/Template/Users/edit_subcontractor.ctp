<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
      <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'deleteSubcontractor', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
              <li><?= $this->Html->link(__('List Users'), ['controller'=>'users','action' => 'list_sub_contractor']) ?> </li>
    </ul>
</nav>-->
<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill Details </h3>
                </div>
                <div class="box-body">
                    <?= $this->Form->create($user) ?>
                      <?php echo $this->Form->control('id',[
				  'templates' => [
                                        'inputContainer' => '<div class="form-group">{{content}}</div>'
                                    ],
                                        'class' => 'form-control',
                                                    'type' => 'hidden',
                                                    'value' => $user->id,
                                        ]); ?>
               
                 
                          <?php
                        echo $this->Form->control('name', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Name',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Name',
                            
                        ]);
                        ?>
                      
                        <?php
                        echo $this->Form->control('phone', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Phone Number',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Phone Number',
                            
                        ]);
                        ?>
                    
                    <?php
                        echo $this->Form->control('address', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Address',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Address',
                            
                        ]);
                        ?>
                      <?php
                        echo $this->Form->control('ssnumber', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'SS Number',
                            'class' => 'form-control',
                            'placeholder' => 'Enter SS Number'
                        ]);
                        ?>
                      

                    <?php
                    echo $this->Form->control('fileupload', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Upload',
                        'class' => 'form-control',
                        'type' => 'file'
                    ]);
                    ?>
                    <?php if (!empty($user->fileupload)) { ?>
                    <div><?php echo $user->fileupload; ?></div> 
                    <?php } ?>
                    <p class="help-block">Upload & Attach Copy w-9 ? </p>
                    
		
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
