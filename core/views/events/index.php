<html>
<head>
	<title>ES - Events</title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<?= Asset::container('header')->styles() ?>
	<?= Asset::container('header')->scripts() ?>
</head>
<body>
	<div id="container">
		<h1>Events</h1>
		<table>
			<thead>
				<tr>
					<th>Time</th>
					<th>Event</th>
					<th>UUID</th>
					<th>Version</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; foreach($events as $event): $i++; ?>
				<tr<?= ($i % 2 == 0 ? ' class="odd"' : '') ?>>
					<td><?= date('d-m-Y H:i:s', strtotime($event->executed_at)) ?></td>
					<td><?= get_class(unserialize($event->event)) ?></td>
					<td><?= $event->uuid ?></td>
					<td><?= $event->version ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php foreach(ES\EventHandlers::$handlers['event'] as $file => $event): ?>
			<input type="checkbox"> 
			<b><?= $event['title'] ?></b><br>
			<?= $event['description'] ?><br>
			<br>
		<?php endforeach ?>
	</div>
	<?= Asset::container('footer')->scripts() ?>
</body>
</html>