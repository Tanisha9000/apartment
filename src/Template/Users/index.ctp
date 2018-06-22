<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List office user

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Properties</a></li>
        <li class="active"> List office user </li>
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
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <!-- /.box-body -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th style="width:10px;">S.No</th>
                                        <th style="width:120px;">name</th>
                                        <th>phone</th>
                                        <th style="width:120px;">email</th>
                                        <th>address</th>
                                    </tr>
                                    <?php
                                    if (isset($_GET['page'])) {
                                        $i = ($_GET['page'] * 10) + 1;
                                    } else {
                                        $i = 1;
                                    }
                                    foreach ($users as $user):
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td> 
                                            <td><?= h($user->name) ?></td>
                                            <td><?= h($user->phone) ?></td>
                                            <td><?= h($user->email) ?></td> 
                                            <td><?= h($user->address) ?></td>

    <!--                <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
    <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])  ?>
                                        <?php //echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)])  ?>
     </td>-->
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                    <?php endforeach; ?>

                                </tbody></table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </form>
            </div>
            <!-- /.box -->
            <!-- Form Element sizes -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
</section>


<div class="users index large-9 medium-8 columns content">
<!--    <h3><?//= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?//= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('ss_number') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('tax_id') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?//= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?//= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php //foreach ($users as $user): ?>
            <tr>
                <td><?//= $this->Number->format($user->id) ?></td>
                <td><?//= h($user->name) ?></td>
                <td><?//= h($user->email) ?></td>
                <td><?//= h($user->phone) ?></td>
                <td><?//= h($user->address) ?></td>
                <td><?//= h($user->ss_number) ?></td>
                <td><?//= h($user->image) ?></td>
                <td><?//= h($user->tax_id) ?></td>
                <td><?//= h($user->role) ?></td>
                <td><?//= h($user->created) ?></td>
                <td><?//= h($user->modified) ?></td>
                <td class="actions">
                    <?//= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?//php endforeach; ?>
        </tbody>
    </table>-->
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
