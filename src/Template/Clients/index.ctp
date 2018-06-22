<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Actions') ?></li>
        <li><?//= $this->Html->link(__('New Client'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<section class="content-header">
    <h1>
        List Client

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active"> List Client</li>
    </ol>
</section>

<!-- Main content -->

<section class="content content2">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <!-- /.box-body -->
                    <div class="box" style="padding-right:10px;">
                        <!-- /.box-header -->
                        <div class="box-body  table-responsive">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:120px;"> name</th>
                                        <th style="width:120px;">email</th>
                                        <th>phone</th>
                                        <th>location</th>
                                        <th>address</th>
                                        <th>city</th>
                                        <th>state</th>
                                        <th>zipcode</th>
                                        <th>country</th>
                                        <th>photo</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($clients as $client):
                                        ?>                
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= h($client->firstname) . h($client->lastname) ?></td>
                                            <td><?= h($client->email) ?></td>
                                            <td><?= h($client->phone) ?></td>
                                            <td><?= h($client->location) ?></td>
                                            <td><?= h($client->address) ?></td>
                                            <td><?= h($client->city) ?></td>
                                            <td><?= h($client->state) ?></td>
                                            <td><?= h($client->zipcode) ?></td>
                                            <td><?= h($client->country) ?></td>
                                            <td><?php if($client->image){ ?> <?php echo $this->Html->image('upload_dir/'.$client->image); ?><?php } ?></td>
                                            <td>   
                                            <?php echo $this->Html->link(
                                                'Edit',
                                                '/clients/edit/'.$client->id,
                                                ['class' => 'btn btn-block btn-primary']
                                            ); ?>
                                            <?= $this->Form->postLink(
                                                    __('Delete'),
                                                    ['action' => 'delete', $client->id],
                                                    ['class' => 'btn btn-danger', 
                                                    'confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
                                                ) ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                        <?php endforeach; ?>

                                </tbody></table>
                        </div>
                        <!-- /.box-body -->

                    </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <!-- /.row -->
</section>
<div class="users index large-9 medium-8 columns content">
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	</div>
</div>
<style type="text/css">
	table.table.table-bordered tr td a.btn{
		margin-bottom:5px;
	}
</style>

