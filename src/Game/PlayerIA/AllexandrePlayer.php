<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class AllexandrePlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class AllexandrePlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {

        if ($this->result->getNbRound() == 0)
        {
            //First round
            $choice = 'paper';
        }

        else {


            //Ten round minimal

            if ($this->result->getNbRound() >= 9)
            {
                //Counter to the opposent that gave the same algo than mine

                $concordance = 0;







                    //We analyse the last 10 things of the opponent. This is a counter to opponent that always do the samte things.
                $paperchoice = $rockchoice = $scissorsChoice = 0;

                for ($i = $this->result->getNbRound(); $i = $this->result->getNbRound() - 9; $i--) {
                    if ($this->result->getChoicesFor($this->opponentSide)[$i] == 'rock') {
                        $rockchoice++;
                    } else if ($this->result->getChoicesFor($this->opponentSide)[$i] == 'paper') {
                        $paperchoice++;
                    } else {
                        $scissorsChoice++;
                    }
                }

                //If the opponent made 6 time the same thing, maybe the next will be the same. Well i hoppe he will
                if ($paperchoice >= 6)
                {
                    return 'scissors';
                }
                else if ($rockchoice >= 6)
                {
                    return  'paper';
                }
                else if ($scissorsChoice >= 6)
                {
                    return  'rock';
                }

            }





            //By default, last choice of the opponent.
            if($this->result->getLastChoiceFor($this->opponentSide) == 'rock')
            {
                $choice = 'paper';
            }

            else if($this->result->getLastChoiceFor($this->opponentSide) == 'paper')
            {
                $choice = 'scissors';

            }

            else {
                $choice = 'rock';
            }
        }

        return $choice;
    }

    // -------------------------------------    -----------------------------------------------------
    // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
    // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
    // -------------------------------------    -----------------------------------------------------
    // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
    // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
    // -------------------------------------    -----------------------------------------------------
    // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
    // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
    // -------------------------------------    -----------------------------------------------------
    // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
    // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
    // -------------------------------------    -----------------------------------------------------
    // How to get the stats                ?    $this->result->getStats()
    // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
    //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
    // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
    //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
    // -------------------------------------    -----------------------------------------------------
    // How to get the number of round      ?    $this->result->getNbRound()
    // -------------------------------------    -----------------------------------------------------
    // How can i display the result of each round ? $this->prettyDisplay()
    // -------------------------------------    -----------------------------------------------------


};