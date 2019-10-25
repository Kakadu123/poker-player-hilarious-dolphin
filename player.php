<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($game_state)
    {
    	$stderr =  fopen('php://stderr', 'w');
    	$my_cards = $game_state['players'][$game_state['in_action']]['hole_cards'];
    	
		fwrite($stderr, " \r\n\r\n\n\n\n\n New Turnaj");

		fwrite($stderr, " \n First: " . $my_cards[0]['rank']);
		fwrite($stderr, " \n Second: " . $my_cards[1]['rank']);
		
		foreach ($game_state['community_cards'] as $key => $value) {
    		fwrite($stderr, $value['rank']);
    		if ($my_cards[0]['rank'] == $value['rank'] || $my_cards[1]['rank'] == $value['rank']) {
    			return 1000;	
    		}
    	}

    	if($my_cards[0]['rank'] == $my_cards[1]['rank']) {
    		fwrite($stderr, "\n YAY! A pair\n");
        	return 1000;
    	}
        else {
        	fwrite($stderr, "NAY! No pair\n");
        	return 0;
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