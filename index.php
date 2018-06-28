<?php 
	function getStringBetween($teks, $sebelum, $sesudah)
	{
		$teks = ' '.$teks;
		$ini = strpos($teks, $sebelum);
		if ($ini == 0) return '';
		$ini += strlen($sebelum);
		$panjang = strpos($teks, $sesudah, $ini) - $ini;
		return substr($teks, $ini, $panjang);
	}


	$url = "https://www.bukalapak.com/p/handphone/hp-smartphone/i4tuzj-jual-lg-q6-3-32-gb-garansi-resmi?from=&keyword=";

	$teks = file_get_contents($url);

	$data = [
		'title' => getStringBetween($teks, "<h1 class='c-product-detail__name qa-pd-name'>", "</h1>"),
		'price' => getStringBetween($teks, 'data-reduced-price=','data-installment='),
		'category' => getStringBetween($teks,"<dd class='c-deflist__value qa-pd-category-value qa-pd-category'>", "</dd>"),
		'description' => getStringBetween($teks, "<div class='js-collapsible-product-detail qa-pd-description u-txt--break-word' style='max-height: none; height: 228px;' data-readmore='' aria-expanded='false' id='rmjs-2'>\n<p>", '</p>')
	];


	echo '<pre>';
	print_r($data);
	echo '</pre>';
 ?>
