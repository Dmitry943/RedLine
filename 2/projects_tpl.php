<?foreach ($items as $key => $item): ?>
<div class="col-sm-4">
	<h2><?= $key ?></h2>
<?	foreach ($item as $item2): ?>
	<h3><?= $item2['name'] ?></h3>
	<div><b>Телефон: </b><?= $item2['phone'] ?></div>
	<div><b>Дата:</b> <?= date("d-m-Y", $item2['date']) ?></div>
	<div><b>Пользователь: </b><?= $item2['user_name'] ?></div>
<?	endforeach ?>
</div>
<?endforeach ?>