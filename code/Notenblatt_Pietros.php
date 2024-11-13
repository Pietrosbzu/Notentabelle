<?php

/*
@author Pietros <gebretitiospietros@outlook.com>
@copyright 2024 Pietros Gebretitios
@version 1.0.0
@license OpenGL
@Quellen PHP_Manual, W3-School, Stackoverflow
*/


// Funktion zur Auswahl des Fachs
function fachAuswahl() {
  $faecher = [
    'M' => 'Modul',
    'MA' => 'Mathe',
    'E' => 'Englisch',
    'ABU' => 'ABU',
    'S' => 'Sport'
  ];

  echo "Bitte wählen Sie ein Fach:\n";
  foreach ($faecher as $hallo => $fach) {
    echo "  [$hallo] $fach\n";
  }

  $laufend = true;
  do {
    $wahl = strtoupper(readline("Geben Sie den Anfangsbuchstaben des Fachs ein: "));
    if (array_key_exists($wahl, $faecher)) {
      echo "Ausgewähltes Fach: " . $faecher[$wahl] . "\n";
      return $faecher[$wahl]; // Fach zurückgeben
      $laufend = false;
    } else {
      echo "Ungültige Auswahl! Bitte erneut wählen.\n";
    }
  } while ($laufend);
}

$gewähltesFach = fachAuswahl();

$eingabe = " ";
$noten = [];
$regex = "/^[1-5](\.[05])?$|^6(\.0)?$/"; // Regex für Noten zwischen 1 und 6

do {
  echo ("\nNoteneingabe für $gewähltesFach\n");
  $note = readline("Eingabe der Note (Beenden [x]):  \n");

  if (strtolower($note) == "x") {
    $eingabe = "x";
  } elseif (preg_match($regex, $note)) {
    $noten[] = (float)$note;
  } else {
    echo "Bitte eine Schulnote zwischen 1 und 6 eingeben.\n";
  }
} while ($eingabe != "x");  // Bis x zum Beenden eingegeben wird

// Durchschnitt berechnen und anzeigen, wenn Noten vorhanden sind
if (count($noten) > 0) {
  $durchschnitt = array_sum($noten) / count($noten);
  echo ("Dein Notendurchschnitt in $gewähltesFach liegt bei $durchschnitt.\n");
} else {
  echo ("Keine gültigen Noten zur Berechnung gefunden.\n");
}
