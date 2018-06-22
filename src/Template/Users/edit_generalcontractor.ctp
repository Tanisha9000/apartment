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
                ['controller'=>'users','action' => 'deleteGeneralcontractor', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller'=>'users','action' => 'listGeneralContractor']) ?></li>
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
                    <?= $this->Form->create($user, array(
                        'type' => 'file',
                        'enctype' => 'multipart/form-data')) ?>
                    
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
                        echo $this->Form->control('taxid', [
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>'
                            ],
                            'label' => 'Tax Id',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Tax Id',
                            'type' => 'text'
                        ]);
                        ?>
                <?php if (!empty($user->image)) { ?>
                    <img src="<?php echo $this->request->webroot . 'img/upload_dir' . '/' . $user->image; ?>" style="height:auto; width:100px; margin:0px;" class="margin">

                    <?php
                    echo $this->Form->control('old_image', [
                        'type' => 'hidden',
                        'value' => $user->image,
                    ]);
                }
                ?>
                   <?php
                    echo $this->Form->control('image', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Logo',
                        'class' => 'form-control',
                        'type' => 'file'
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
