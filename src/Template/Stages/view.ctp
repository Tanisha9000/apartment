<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stage'), ['action' => 'edit', $stage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stage'), ['action' => 'delete', $stage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stages view large-9 medium-8 columns content">
    <h3><?= h($stage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($stage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($stage->modified) ?></td>
        </tr>
    </table>
</div>
