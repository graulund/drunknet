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


	// Oft-used searches:

	// -- One emote only, properly typed
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*(Kappa|Keepo|Kreygasm|PogChamp|danBad|danYay|OpieOP|EleGiggle|ElecGiggle|OMGScoots|BibleThump|BabyRage|OneHand|BigBrother|4Head|SwiftRage|MVGame|ResidentSleeper|DansGame|<3|:\)|:\(|>\()\n

	// -- One character
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*.\n

	// -- Repeating emotes, properly typed
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*((Kappa|Keepo|Kreygasm|PogChamp|danBad|danYay|OpieOP|EleGiggle|ElecGiggle|OMGScoots|BibleThump|BabyRage|OneHand|BigBrother|4Head|SwiftRage|MVGame|ResidentSleeper|DansGame|<3|:\)|:\(|>\()\s*)+\n

	// -- (Boring) greetings
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*hi
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*hel
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*bye
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*(Kappa|Keepo|Kreygasm|PogChamp|danBad|danYay|OpieOP|EleGiggle|ElecGiggle|OMGScoots|BibleThump|BabyRage|OneHand|BigBrother|4Head|SwiftRage|MVGame|ResidentSleeper|DansGame|<3|:\)|:\(|>\() /{1,2}\n

	// -- (Boring) corrections
	// ^(\[#[^\]]+\])?\s*\[[0-9 -:.]+\]\s*\*?\s+<?[a-z]+>?\s*i mean

