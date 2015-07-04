<?php echo anchor('user/create', ucfirst(lang('new')), ['role' => 'button', 'class' => 'btn btn-success pull-right']); ?>

<h4><?php echo ucfirst(lang('user list')); ?></h4>

<table class="table table-bordered table-striped">

	<thead>
		<tr>
			<th><?php echo ucfirst(lang('name')); ?></th>
			<th><?php echo ucfirst(lang('e-mail')); ?></th>
			<th><?php echo ucfirst(lang('username')); ?></th>
			<th><?php echo ucfirst(lang('actions')); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($users as $user) { ?>
		<tr>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->username; ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="...">
					<a href="/user/edit/<?php echo $user->id; ?>" class="btn btn-default btn-xs glyphicon glyphicon-pencil"></a>
					<a href="/user/delete/<?php echo $user->id; ?>" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-confirm="<?php echo ucfirst(sprintf(lang('this user'), lang('really want to delete'))); ?>?"></a>
					<a href="/user/active/<?php echo $user->id; ?>" class="tip btn btn-default btn-xs glyphicon <?php echo ($user->active) ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down'; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo ucfirst(sprintf(lang('this user'), ($user->active) ? lang('deactivate') : lang('activate'))); ?>"></a>
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>