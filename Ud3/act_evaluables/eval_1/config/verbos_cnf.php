<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Array de Verbos Irregulares
     */

    //Constantes
    define("DIFICULTADES", array(
        array("Valor"=>1,"Literal"=>"EASY"),
        array("Valor"=>2,"Literal"=>"NORMAL"),
        array("Valor"=>3,"Literal"=>"HARD")
    ));

    define("COLS", 4);
    define("Cabeceras",array("Infinitive", "Past", "Participle", "Spanish"));

    //Array de verbos irregulares
    $verbos_irr = array(
        array("arise", "arose", "arisen", "surgir"),
        array("awake", "awoke", "awoken", "despertarse"),
        array("be", "was/were", "been", "ser/estar"),
        array("bear", "bore", "born/borne", "soportar"),
        array("beat", "beat", "beaten", "vencer"),
        array("begin", "began", "begun", "comenzar"),
        array("bend", "bent", "bent", "doblar/curvar"),
        array("bet", "bet", "bet", "apostar"),
        array("bite", "bit", "bitten", "morder"),
        array("blow", "blew", "blown", "soplar"),
        array("break", "broke", "broken", "romper"),
        array("bring", "brought", "brought", "traer"),
        array("buy", "bought", "bought", "coprar"),
        array("catch", "caught", "caught", "atrapar/coger"),
        array("come", "came", "come", "venir/llegar"),
        array("do", "did", "done", "hacer"),
        array("draw", "drew", "drawn", "dibujar/empatar"),
        array("drink", "drank", "drunk", "berber/emborracharse"),
        array("drive", "drove", "driven", "conducir"),
        array("eat", "ate", "eaten", "comer"),
        array("fall", "fell", "fallen", "caer"),
        array("feel", "felt", "felt", "sentir"),
        array("find", "found", "found", "encontrar"),
        array("fly", "flew", "flown", "volar"),
        array("forget", "forgot", "forgotten", "olvidar"),
        array("give", "gave", "given", "dar"),
        array("go", "went", "gone", "ir"),
        array("grow", "grew", "grown", "crecer"),
        array("have", "had", "had", "tener/haber"),
        array("know", "knew", "known", "saber"),
        array("lie", "lay", "lain", "mentir"),
        array("meet", "met", "met", "conocer"),
        array("read", "read", "read", "leer"),
        array("ride", "rode", "ridden", "montar"),
        array("ring", "rang", "rung", "sonar/tocar"),
        array("run", "ran", "run", "corrar"),
        array("see", "saw", "seen", "ver"),
        array("shake", "shook", "shaken", "sacudir"),
        array("sing", "sang", "sung", "cantar"),
        array("speak", "spoke", "spoken", "hablar"),
        array("swim", "swam", "swum", "nadar"),
        array("take", "took", "taken", "tomar/llevar"),
        array("tear", "tore", "torn", "rasgar"),
        array("throw", "threw", "thrown", "tirar"),
        array("understand", "understood", "understood", "entender"),
        array("wake", "woke", "woken", "despertar"),
        array("wear", "wore", "worn", "llevar"),
        array("win", "won", "won", "ganar"),
        array("write", "wrote", "written", "escribir")
    );

    define("LENGTH", count($verbos_irr));
?>