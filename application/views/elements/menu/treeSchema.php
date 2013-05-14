<?
return array(
	0	=> array(
		'tmpl'	=> array(
			'start'	=> '
				<li class="menu_top_item">
					<span class="menu_top_item_label"><?=$category_name?></span>
						<ul>',
			'end'	=> "</ul></li>"
		)),
	1	=> array(
		'tmpl'	=> array(
			'start'	=> '<li class="menu_sub_item">
							<span class="menu_sub_item_label"><?=$category_name?></span>
								<ul class="menu_item">',
			'end'	=> "</ul></li>"
		)),
	2	=> array(
		'tmpl'	=> array(
			'start'	=> '<li class="menu_last_item">
							<span class="menu_item_spacer">&nbsp;</span><a href="http://yandex.ru">&mdash; <?=$category_name?></a>',
			'end'	=> "</li>"
		)),
	3	=> array(
		'tmpl'	=> array(
			'start'	=> '<div id="<?=$category_id?>"><?=$category_name?>',
			'end'	=> "</div>"
		)),
	4	=> array(
		'tmpl'	=> array(
			'start'	=> '<div id="<?=$category_id?>"><?=$category_name?>',
			'end'	=> "</div>"
		)),
);