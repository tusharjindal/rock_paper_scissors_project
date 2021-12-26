<?php
$game = array("1"=>"rock", "2"=>"paper", "3"=>"scissor");
$userchoice='1';
$comp=rand(1,3);
if ($userchoice==1){
    if($comp==1){
       echo "draw";
    }
    elseif($comp==2){
        echo "computer wins";
    }
    else{
        echo "you win";
        score=score+1;
    }
}
elseif ($userchoice==2){
    if($comp==2){
       echo "draw";
    }
    elseif($comp==3){
        echo "computer wins";
    }
    else{
        echo "you win";
        score=score+1;
    }
}
elseif ($userchoice==3){
    if($comp==3){
       echo "draw";
    }
    elseif($comp==1){
        echo "computer wins";
    }
    else{
        echo "you win";
        score=score+1;
    }
}

?>