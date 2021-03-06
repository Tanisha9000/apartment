<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar"> -->

    <!-- <ul class="side-nav"> -->
        <!-- <li class="heading"><?//= __('Actions') ?></li> -->
        <?//= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id,'class' => 'btn btn-block btn-primary']) ?> 
        <?php // echo $this->Html->link(
              //              'Edit User',
              //              '/users/editSubcontractor/'.$user->id,
              //              ['class' => 'btn btn-block btn-success', 'target' => '_blank']
      //  ); ?>
        <!-- <li><?//= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li> -->
        <!-- <li><?//= $this->Html->link(__('List Users'), ['controller'=>'users','action' => 'list_office_user']) ?> </li> -->
     <!-- </ul> -->
<!-- </nav> -->
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ss Number') ?></th>
            <td><?= h($user->ss_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <?php echo $this->Html->image('upload_dir/'.$user->image); ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Id') ?></th>
            <td><?= h($user->tax_id) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?//= __('Role') ?></th>
            <td><?//= h($user->role) ?></td>
        </tr>  
        <tr>
            <th scope="row"><?//= __('Id') ?></th>
            <td><?//= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?//= __('Created') ?></th>
            <td><?//= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?//= __('Modified') ?></th>
            <td><?//= h($user->modified) ?></td>
        </tr> -->
    </table>
</div>
