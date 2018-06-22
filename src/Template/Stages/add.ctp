<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Actions') ?></li>
        <li><?//= $this->Html->link(__('List Stages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="stages form large-9 medium-8 columns content">
    <?//= $this->Form->create($stage) ?>
    <fieldset>
        <legend><?//= __('Add Stage') ?></legend>
        <?php
           // echo $this->Form->control('name');
        ?>
    </fieldset>
    <?//= $this->Form->button(__('Submit')) ?>
    <?//= $this->Form->end() ?>
</div>-->

<section class="content-header">
    <h1>
        add stage
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add stage</li>
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
                    <h3 class="box-title">Information </h3>
                </div>
                <div class="box-body">
                    <?=
                    $this->Form->create($stage)                    ?>

                    <?php
                    echo $this->Form->control('name', [
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ],
                        'label' => 'Stage Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Stage'
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
