<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($game_state)
    {
    	$stderr =  fopen('php://stderr', 'w');
    	$my_cards = $game_state['players'][$game_state['in_action']]['hole_cards'];
    	
		fwrite($stderr, " \r\n\r\n New Turnaj");

		fwrite($stderr, " \n First: " . $my_cards[0]['rank']);
		fwrite($stderr, " \n Second: " . $my_cards[1]['rank'] . "\r\n");


		 // fwrite($stderr, " \n Print Array Samo " . var_export($game_state));
		// create array of community cards
		$arrayComm = Array();
		foreach ($game_state['community_cards'] as $value) {
    		$arrayComm[] = $value['suit'];
    	}

    	$comm = false;
    	$comm  = ((count($arrayComm) >= 3) ? true : false); 
    	// fwrite($stderr, " \r\n Communitne " . $comm);

		$arrayComm[] = $my_cards[0]['suit'];
		$arrayComm[] = $my_cards[1]['suit'];

		$spades = 0;
		$clubs = 0;
		$hearts = 0;
		$diamonds = 0;

		foreach ($arrayComm as $value) {
    		 if ($value == 'spades') {
    		 	$spades++;	
    		 }
    		 if ($value == 'clubs') {
    		 	$clubs++;	
    		 }
			if ($value == 'hearts') {
    		 	$hearts++;	
    		 }
    		 if ($value == 'diamonds') {
    		 	$diamonds++;	
    		 }   		 
    	}

    	if($spades >= 5 || $clubs >= 5 || $hearts >= 5 || $diamonds >= 5 ) {
    		return 800;
    	}

    	fwrite($stderr, " \n spades " . $spades);
    	fwrite($stderr, " \n clubs " . $clubs);
    	fwrite($stderr, " \n hearts " . $hearts);
    	fwrite($stderr, " \n diamonds " . $diamonds);

		// fwrite($stderr, " \n Print Array Samo " . json_encode($arrayComm);
		
		foreach ($game_state['community_cards'] as $value) {
    		fwrite($stderr, " \n CommunityCard: " . $value['rank']);
    		if ($my_cards[0]['rank'] == $value['rank'] || $my_cards[1]['rank'] == $value['rank']) {
    			return 300;	
    		}
    	}

    	if($my_cards[0]['rank'] == $my_cards[1]['rank']) {
    		fwrite($stderr, "\r\n YAY! A pair\n");
        	return 300;
    	}
        else {
        	fwrite($stderr, "\r\n NAY! No pair\n");

        	if ($comm) {
        		return 150;	
        	} else {
				return 50;
        	}
        	
        }

		fwrite($stderr, " \n Koniec Turnaj \n\n\n\n\n");


    }

    public function showdown($game_state)
    {
    }
}



		// fwrite($stderr, "0" . $game_state['community_cards'][0]['rank']);


		// elseif ($my_cards[0]['rank'] == $game_state['community_cards'][0]['rank']) {
		// 	return 500;
		// }


		// elseif ($my_cards[0]['rank'] == $game_state['community_cards'][1]['rank']) {
		// 	return 500;
		// }
		// elseif ($my_cards[0]['rank'] == $game_state['community_cards'][2]['rank']) {
		// 	return 500;
		// }
		// elseif ($my_cards[1]['rank'] == $game_state['community_cards'][0]['rank']) {
		// 	return 500;
		// }
		// elseif ($my_cards[1]['rank'] == $game_state['community_cards'][1]['rank']) {
		// 	return 500;
		// }
		// elseif ($my_cards[1]['rank'] == $game_state['community_cards'][2]['rank']) {
		// 	fwrite($stderr, "NAY! No pair\n");
		// 	return 500;
		// }