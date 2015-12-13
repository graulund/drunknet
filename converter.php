<?php
	// DRUNKNET CONVERTER
	// Just remove the meta data.

	$origLines = explode("\n", file_get_contents('origlines.txt'));
	$lines = '';

	foreach($origLines as $line){

		if(!$line){
			continue;
		}

		//                     Channel          Timestamp       Action/Name
		$l = preg_replace('/^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*/', '', trim($line));
		$lines .= $l . "\n";
	}

	file_put_contents('lines.txt', $lines);
