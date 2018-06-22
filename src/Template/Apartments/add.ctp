<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Apartments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apartments form large-9 medium-8 columns content">
    <?= $this->Form->create($apartment) ?>
    <fieldset>
        <legend><?= __('Add Apartment') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('floors_id', ['options' => $floors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
