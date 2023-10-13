<?php add_filter( 'the_content', 'remove_extremism' );?>
<?php function remove_extremism($content) {
		if (empty($content)) { 
		return '';
	};

	$extremism = ['Instagram', 'instagram', 'Инстаграм', 'инстаграм', 'Инстаграмм', 'инстаграмм',
	'Instagram.', 'instagram.', 'Инстаграм.', 'инстаграм.', 'Инстаграмм.', 'инстаграмм.',
	'Instagram,', 'instagram,', 'Инстаграм,', 'инстаграм,', 'Инстаграмм,', 'инстаграмм,',
	'"Instagram"', '"instagram"', '"Инстаграм"', '"инстаграм"', '"Инстаграмм"', '@инстаграмм"',
	'Facebook', 'facebook', 'Фэйсбук', 'фэйсбук', 'Фейсбук', 'фейсбук',
	'Facebook.', 'facebook.', 'Фэйсбук.', 'фэйсбук.', 'Фейсбук.', 'фейсбук.',
	'Facebook,', 'facebook,', 'Фэйсбук,', 'фэйсбук,', 'Фейсбук,', 'фейсбук,',
	'"Facebook"', '"facebook"', '"Фэйсбук"', '"фэйсбук"', '"Фейсбук"', '"фейсбук"',
	'Twitter', 'twitter', 'Твиттер', 'твиттер', 'Твитер', 'твитер',
	'Twitter.', 'twitter.', 'Твиттер.', 'твиттер.', 'Твитер.', 'твитер.',
	'Twitter,', 'twitter,', 'Твиттер,', 'твиттер,', 'Твитер,', 'твитер,',
	'"Twitter"', '"twitter"', '"Твиттер"', '"твиттер"', '"Твитер"', '"твитер"'];
	
	$content_arr = mb_split(" ", $content);
	$is_extremism = false;
	foreach($content_arr as $i => $content_word) {
		if (in_array($content_word, $extremism)) {
			$content_arr[$i] = $content_word.'*';
			$is_extremism = true;
		}
	}

	$content = implode(' ', $content_arr);
	if ($is_extremism) { 
		$content .= "<p></p><p>*Признана экстремистской организацией и запрещена на территории РФ</p>";
	};

	return $content;
}
?>
