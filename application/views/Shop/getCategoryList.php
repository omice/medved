<div id="content">

	<!-- Поисковая строка -->
	<?= View::factory('elements/search/bar');?>
	<!-- //Поисковая строка -->

	<!-- Каталог -->
	<?/*
		<!-- Подкаталог раздела блока контента -->
		<?= View::factory('elements/menu/SubCategoryMenu')?>
		<!-- //Подкаталог раздела блока контента -->

		<div class="splitter"></div>
	*/?>
		<div id="catalogue_price">
			<h2>Товары в категории «Лебёдки»</h2>
		</div>

		<!-- Фильтр по атрибутам товаров -->
		<?= View::factory('Shop/elements/CategoryFilter');?>
		<!-- //Фильтр по атрибутам товаров -->

		<!-- Товары -->
		<?= View::factory('Shop/elements/CategoryList');?>
		<!-- //Товары -->

	<!-- //Каталог -->
	<div style="height:10px;lear:both; padding-top: 10px;">&nbsp;</div>
</div>