<!DOCTYPE <?=$View->Header['doctype']?>>
<html> 
	<head>
		<title><?=$View->Header['title']?></title>

		<meta http-equiv="Content-Type" content="<?=$View->Header['content']?>; charset=<?=$View->Header['charset']?>">

		<?foreach($View->Header['meta'] as $metaName => $metaValue):?>
		<meta name="<?=$metaName?>" content="<?=$metaValue?>">
		<?endforeach;?>

		<?foreach($View->Header['script'] as $scriptSource => $scriptType):?>
		<script src="<?=$scriptSource?>" type="<?=$scriptType?>"></script>
		<?endforeach;?>

		<?foreach($View->Header['css'] as $cssSource => $cssRel):?>
		<link href="<?=$cssSource?>" type="text/css" rel="<?=$cssRel?>"/>
		<?endforeach;?>
	</head>

	<body>

		<table id="main_table">

			<tr>
				<td id="top_left">
					<a href="/"><div id="logo"></div></a>
				</td>

				<td id="top_header">

					<?= View::factory('elements/top');?>

					<?= View::factory('elements/menu/hmenu');?>

				</td>
			</tr>


			<?//= View::factory('elements/cart/into');?>

			<?= View::factory('elements/cart/info');?>


			<tr>
				<td style="background-image: url('/static/img/left_column_bg.png'); background-position: top; background-repeat: no-repeat;">

					<?= View::factory('elements/menu/vmenu');?>

					<?= View::factory('elements/banner/partners');?>

				</td>
				<td>

					<?=$childView?>

				</td>
			</tr>

			<?= View::factory('elements/footer');?>

		</table>

	</body>
</html>
<?= View::factory('profiler/stats');?>