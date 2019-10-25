<?php

class Player
{
    const VERSION = "Default PHP folding player";

    public function betRequest($game_state)
    {

    	$my_cards = $game_state['players'][$game_state['in_action']]['hole_cards'];
    	if($my_cards[0]['rank'] == $my_cards[1]['rank']) {

    		fwrite(STDERR, "YAY! A pair\n");
        	return 10000;
    	}
    		
        else {

        	fwrite(STDERR, "NAY! No pair\n");
        	return 0;
        }
    }

    public function showdown($game_state)
    {
    }
}
