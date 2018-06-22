<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor $floor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Floors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="floors form large-9 medium-8 columns content">
    <?= $this->Form->create($floor) ?>
    <fieldset>
        <legend><?= __('Add Floor') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('buildings_id', ['options' => $buildings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
