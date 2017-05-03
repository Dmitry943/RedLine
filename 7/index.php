<?
$books = array(
	array(
		'title' => 'Книга первая',
		'authors' => array(
			'Пушкин',
			'Лермонтов',
			'Чехов',
		)
	),
	array(
		'title' => 'Книга вторая',
		'authors' => array(
			'Пушкин',
			'Чехов',
		)
	),
	array(
		'title' => 'Книга третья',
		'authors' => array(
			'Лермонтов',
			'Чехов',
		)
	),
);

?>
<style>
table {
	border-collapse: collapse;
}
td, th {
	padding: 5px;
	border: 1px solid gray;
}
</style>

<table>
	<tr>
		<th>Название книги</th>
		<th>Авторы</th>
	</tr>
<?foreach ($books as $item): ?>
	<tr>
		<td><?= $item['title'] ?></td>
		<td>
<?	foreach ($item['authors'] as $item2): ?>
			<?= $item2 ?><br>
<?	endforeach ?>
		</td>
	</tr>
<?endforeach ?>
</table>