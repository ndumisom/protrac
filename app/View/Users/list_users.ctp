<div class="users index">
	<h2><?php echo __('Other users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?></li>
        <li><div class="filters">
		<h3>Filters</h3>
		<?php
		// The base url is the url where we'll pass the filter parameters

		$base_url = array('controller' => 'users', 'action' => 'listUsers');
		echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
		// Add a basic search 
		echo $this->Form->input("search", array('label' => 'Search', 'placeholder' => "Search..."));

		echo $this->Form->submit("Search");

		// To reset all the filters we only need to redirect to the base_url
		
		echo $this->Html->link("Reset",$base_url);
		
		echo $this->Form->end();
		?>
	</div></li>
	</ul>
</div>
