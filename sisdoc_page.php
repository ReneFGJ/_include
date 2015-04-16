<?php
function mostra_pagina($atual, $total, $page, $offset = 30) {
	/* Pula linha */
	$cr = chr(10) . chr(13);
	$atual = (int)($atual / 10) * 10;
	$xatual = $atual;
	/* Calculo das paginas */
	$start = (int)($atual / $offset);
	$pages = (int)($total / $offset);

	/* Casos */
	/* Total de paginas < 11 */
	if ($pages <= 10) {
		$end = $start + $pages;
	} else {
		$end = $start + 10;
	}

	$sx = '<span id="pages_number">';
	$sx .= '<ul class="pages_nr">';
	$sx .= '	<li class="no_link"><a href="' . page() . '?dd91=0">«« Início</A></li>' . $cr;
	$sti = (int)($atual - $offset);
	if ($sti < 0) { $sti = 0;
	}
	$sx .= '	<li class="no_link"><a href="' . page() . '?dd91=' . $sti . '">« Previous Page</A></li>' . $cr;

	/* Mostra numeros */
	$max = 10;

	/* Final */
	if (($atual + 10 * $offset) > $total) {
		$xtotal = (int)($total / $offset) * $offset;
		$atual = (int)($xtotal - 9 * $offset);
	}
	$fim = (int)($total / $offset);

	for ($r = $atual; $r < $total; $r = ($r + $offset)) {
		$max--;

		$current = '';
		if ($r == $xatual) { $current = 'class="current" ';
		}

		$ir = ((int)($r / $offset) + 1);
		if ($r >= 0) {
			$sx .= '	<li ' . $current . ' ><a href="' . page() . '?dd91=' . ($r) . '">' . $ir . '</A></li>' . $cr;
		}
		$pg_next = $r;
		if ($max == 0) {   $r = $total;
		}
	}
	$pg_next = ($pg_next + $offset);
	if ($pg_next > $xtotal) { $pg_next = $xtotal; }
	$sx .= '<li><a href="' . page() . '?dd91=' . $pg_next . '">Next Page »</a></li>' . $cr;
	$fim = (int)($total / $offset);
	$sx .= '	<li class="no_link"><a href="' . page() . '?dd91=' . ($fim * $offset) . '">Fim »»</A></li>' . $cr;
	$sx .= '</ul></span>' . $cr;
	return ($sx);
}
?>

<style>
	#pages_number {
		font-size: 12px;
		color: #333333;
		text-align: right;
		border: 1px solid #303030;
	}
	#pages_number li {
		float: left;
		display: inline;
		margin: 0 5px 0 0;
		display: block;
	}
	#pages_number li a {
		color: #333333;
		padding: 4px;
		border: 1px solid #ddd;
		text-decoration: none;
		float: left;
	}
	#pages_number li a:hover {
		color: #333333;
		background: #e0e0e0;
		border: 1px solid #000000;
	}
	#pages_number li.current a {
		min-width: auto;
		color: #FFF;
		background: #808080;
		border: 0px solid #303030;
	}
	#pages_number li.current a	:hover {
		min-width: auto;
		color: #FFF;
		background: #808080;
		border: 0px solid #303030;
	}
</style>
