<?php
$GameHeroesAssociate = array (
    "Mass Effect" => array("Hero" => "Shepard", "Sidekick" => "Garrus"),
    "Halo" => array("Hero" => "Master Chief", "Sidekick" => "Cortana"),
    "Metal Gear" => array("Hero" => "Solid Snake", "Sidekick" => "Ottacon"),
    "Kingdom Hearts" => array("Hero" => "Sora", "Sidekick" => "Goofy"),
);



foreach ($GameHeroesAssociate as $key => $value) {
    echo $key . "\n";
    foreach ($value as $sub_key => $sub_val) {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
}