<?
$uriPrefix = '/6/';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?= $dft['title'] ?> :: Books</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?= ENGINE_PathBrRoot ?>/css/sticky-footer-navbar.css">
	<link rel="stylesheet" href="<?= ENGINE_PathBrRoot ?>/css/main.css?<?//= time() ?>">

	<script src="<?= ENGINE_PathBrRoot ?>/js/main.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-custom">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= $uriPrefix ?>">Books</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="<?= $uriPrefix ?>?page=books">Книги</a></li>
			<li><a href="<?= $uriPrefix ?>?page=authors">Авторы</a></li>
		</ul>
	</div>
</nav>

<div class="container">
<?if (!empty($dft['title'])): ?>
	<h1><?= $dft['title'] ?></h1>
<?endif ?>
<?= $dft['content'] ?>
</div>

<footer class="footer">
	<div class="container">
		<p class="text-muted"><?= date('d-m-Y H:i:s') ?></p>
	</div>
</footer>	

</body>
</html>