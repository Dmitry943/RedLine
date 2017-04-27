<!DOCTYPE html>
<html lang="ru">
<head>
	<title>title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="main.js"></script>
</head>
<body>

	<div class="container">

		<h1>Список проектов</h1>
		
		<form method="post">
			<div class="form-group">
				<label for="search">Поиск (телефон или название проекта):</label>
				<input type="text" class="form-control" id="search" name="search" value="<?= $search ?>">
			</div>
			<button id="butSubmit" type="submit" class="btn btn-default" name="submit" value="submit">Найти / обновить</button>
		</form>
		
		<div class="content">
			<?= $content ?>
		</div>

	</div>	
	
</body>
</html>
