<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apartment'), ['action' => 'edit', $apartment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apartment'), ['action' => 'delete', $apartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apartments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apartment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="col-md-12 col-sm-12">
	<div class="box box-primary">
		<div class="box">
			<div class="box-body">
    <!--h3><?= h($apartment->name) ?></h3-->
    <div class="col-md-5 col-sm-5">
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($apartment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor') ?></th>
            <td><?= $apartment->has('floor') ? $this->Html->link($apartment->floor->name, ['controller' => 'Floors', 'action' => 'view', $apartment->floor->id]) : '' ?></td>
        </tr>
    </table>
	<div class="btn-sec">
                <?php
                if (!empty($apartment->rooms)) {
                    echo $this->Html->link(__('List Rooms'), ['controller' => 'rooms', 'action' => 'index', $apartment->id]);
                }else{
                    echo $this->Html->link(__('Add Room'), ['controller' => 'rooms', 'action' => 'addroom', $apartment->id]);
                }
                ?>
             <?php echo $this->Html->link(__('Add Apartment'), ['controller' => 'apartments', 'action' => 'addapartment', $apartment->floor->id]); ?>
	</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
table tr th,
table tr td{
	text-align:left !important;
}
.btn-sec a{
	margin-right:10px;
}
</style>
