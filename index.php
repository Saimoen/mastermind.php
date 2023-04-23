<?php
    function write(string $message)
    {
        fwrite(STDOUT, $message . PHP_EOL);
    }

    /** TEST LINUX */

    write("Début du jeu");
    $ran1 = rand(0,9);
    $ran2 = rand(0,9);
    $ran3 = rand(0,9);
    $ran4 = rand(0,9);
    $essaies = 0;
    $ranArray = [$ran1, $ran2, $ran3, $ran4];
    $solution = ($ran1 . $ran2 . $ran3 . $ran4);
 
    $guess ="";

    while ($guess != $solution && $essaies < 10){
        $essaies++;
        PHP_EOL;
        write("=========== Essaie Numéro: " . $essaies . " ============");
        $userGuess = readline("Entrez votre combinaison à quatre chiffres : ");
        $userGuess = str_replace(' ' , '', $userGuess);
        $userArray = str_split($userGuess);
        if (!is_numeric($userGuess)){
            write("Veuillez rentrer un nombre");
            continue;
        }

        if (strlen($userGuess) != 4){
            write("Veuillez rentrez un nombre 4 chiffres");
            continue;
        }
        $guess1 = $userArray[0];
        $guess2 = $userArray[1];
        $guess3 = $userArray[2];
        $guess4 = $userArray[3];

        foreach($userArray as $key => $value) {
            if($ranArray[$key] == $value) {
                write("le chiffre en position " . $key +1 . " est à la bonne place");
            }elseif(in_array($value,$ranArray)){
                write($value . " est dans le nombre");
            }
        }

        if($userGuess === $solution) {
            die("========== Vous avez Gagnez ===========");
        }
    }
?>