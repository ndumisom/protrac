<?php
$this->Html->css('base', null, array('inline' => false));
?>
<div class="movies index">
	<h2><?php echo __('Movies'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th>Genre</th>
			<th>Director</th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th>Description</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
		<td>
			<?php echo $user['User']['email']; ?>
		</td>

		<td><?php echo $this->Text->highlight(h($user['User']['phone']), $search); ?>&nbsp;</td>
		<td><?php echo $this->Text->highlight(h($user['User']['password']), $search); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Movie'), array('action' => 'add')); ?></li>
		<li><div class="filters">
		<h3>Filters</h3>
		<?php
		// The base url is the url where we'll pass the filter parameters
		$base_url = array('controller' => 'users', 'action' => 'index2');
		echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
		// Add a basic search 
		echo $this->Form->input("search", array('label' => 'Search', 'placeholder' => "Search..."));

		echo $this->Form->submit("Valider");

		// To reset all the filters we only need to redirect to the base_url
		echo "<div class='submit actions'>";
		echo $this->Html->link("Reset",$base_url);
		echo "</div>";
		echo $this->Form->end();
		?>
	</div></li>
		
	</ul>
</div>
