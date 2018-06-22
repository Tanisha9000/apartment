<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Apartments'), ['controller' => 'Apartments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apartment'), ['controller' => 'Apartments', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="content-wrapper" style="margin:0px;">
	<div class="col-md-12 col-sm-12">
		<div class="box box-primary">
			<div class="box">
				<div class="box-body">
		<!--h3><?= h($room->name) ?></h3-->
		<div class="col-md-5 col-sm-5">
		<table class="table table-bordered">
			<tr>
				<th scope="row"><?= __('Name') ?></th>
				<td><?= h($room->name) ?></td>
			</tr>
			<tr>
				<th scope="row"><?= __('Apartment') ?></th>
				<td><?= $room->has('apartment') ? $this->Html->link($room->apartment->name, ['controller' => 'Apartments', 'action' => 'view', $room->apartment->id]) : '' ?></td>
			</tr>
		</table>
		<div class="btn-sec">
			<?php echo $this->Html->link(__('Add Room'), ['controller' => 'rooms', 'action' => 'addroom', $room->apartment->id]); ?>
		</div>
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
