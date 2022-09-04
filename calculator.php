<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="calculator.css">
  <title>Mana Calculator</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<form name="form" action="" method="get">
  <div class="flex-container">
    <div>
      <h3>Spell Costs:</h3>
      <table id="expandtable">
        <tr>
          <td>1st spell cost:</td>
          <td><input type="number" step=".01" name="1st" id="1st" min="1" value="<?php $one = $_GET["1st"]; echo $one; ?>"></td>
        </tr>
        <tr>
          <td>2nd spell cost:</td>
          <td><input type="number" step=".01" name="2nd" id="2nd" min="1" value="<?php $two = $_GET["2nd"]; echo $two; ?>"></td>
        </tr>
        <tr>
          <td>3rd spell cost:</td>
          <td><input type="number" step=".01" name="3rd" id="3rd" min="1" value="<?php $three = $_GET["3rd"]; echo $three; ?>"></td>
        </tr>
        <tr>
          <td>4th spell cost:</td>
          <td><input type="number" step=".01" name="4th" id="4th" min="1" value="<?php $four = $_GET["4th"]; echo $four; ?>"></td>
        </tr>
      </table><br></div>
    <div>
      <h3>Cycle:</h3>
      <?php
      $cycle1 = 0;
      $cycle2 = 0;
      $cycle3 = 0;
      $cycle4 = 0;
      $cycle5 = 0;
      $cps = 0;
      ?>
      <table>
        <tr>
          <td>First spell in cycle:</td>
          <td><input type="number" name="cycle1" id="cycle1" min="0" max="4" value="<?php if (strlen($_GET["cycle1"]) > 0) {$cycle1 = $_GET["cycle1"];} echo $cycle1; ?>"></td>
        </tr>
        <tr>
          <td>Second spell in cycle:</td>
          <td><input type="number" name="cycle2" id="cycle2" min="0" max="4" value="<?php if (strlen($_GET["cycle2"]) > 0) {$cycle2 = $_GET["cycle2"];} echo $cycle2; ?>"></td>
        </tr>
        <tr>
          <td>Third spell in cycle:</td>
          <td><input type="number" name="cycle3" id="cycle3" min="0" max="4" value="<?php if (strlen($_GET["cycle3"]) > 0) {$cycle3 = $_GET["cycle3"];} echo $cycle3; ?>"></td>
        </tr>
        <tr>
          <td>Fourth spell in cycle:</td>
          <td><input type="number" name="cycle4" id="cycle4" min="0" max="4" value="<?php if (strlen($_GET["cycle4"]) > 0) {$cycle4 = $_GET["cycle4"];} echo $cycle4; ?>"></td>
        </tr>
        <tr>
          <td>Fifth spell in cycle:</td>
          <td><input type="number" name="cycle5" id="cycle5" min="0" max="4" value="<?php if (strlen($_GET["cycle5"]) > 0) {$cycle5 = $_GET["cycle5"];} echo $cycle5; ?>"></td>
        </tr>
        <tr>
          <td>Clicks per second:</td>
          <td><input type="number" step=".05" name="cps" id="cps" min="1" max="180" value="<?php if (strlen($_GET["cps"]) > 0) {$cps = $_GET["cps"];} echo $cps; ?>"></td>
        </tr>
      </table><br></div>
  <!-- </div> -->
  <!-- ^ -->
    <div>
      <h3>Stats:</h3>
      <?php
      $mr = 0;
      $ms = 0;
      $costredraw1 = 0;
      $costredpct1 = 0;
      $costredraw2 = 0;
      $costredpct2 = 0;
      $costredraw3 = 0;
      $costredpct3 = 0;
      $costredraw4 = 0;
      $costredpct4 = 0;
      ?>
      <table class="stats">
        <tr>
          <td>Mana Regen:</td>
          <td><input type="number" name="mr" id="mr" min="-1000" max="1000" value="<?php if (strlen($_GET["mr"]) > 0) {$mr = $_GET["mr"];} echo $mr; ?>"></td>
        </tr>
        <tr>
          <td>Mana Steal:</td>
          <td><input type="number" name="ms" id="ms" min="-1000" max="1000" value="<?php if (strlen($_GET["ms"]) > 0) {$ms = $_GET["ms"];} echo $ms; ?>"></td>
        </tr>
      <!-- </table> -->
        <tr>
          <td><div class="align"><label for="transcendence">Transcendence:</label></div></td>
          <td><input type="checkbox" id="transcendence" name="transcendence" value="checked" <?php echo $_GET["transcendence"]; ?>></td>
        </tr>
        <tr id="exp">
          <td class="top"><div class="align"><label for="radiance">Radiance:</label></div></td>
          <td><input type="checkbox" id="radiance" name="radiance" value="checked" <?php echo $_GET["radiance"]; ?>>
          <!-- <td><input type="checkbox" class="collapsible" id="radiance" name="radiance" value="checked" <?php echo $_GET["radiance"]; ?>> -->
          <button type="button" class="collapsible">Insert spell costs for radiance</button>
            <div id="expandtable">
              <table class="fancy">
                <tr>
                  <th>Spell cost reduction</th>
                  <th>Raw</th>
                  <th>%</th>
                </tr>
                <tr>
                  <th>1st spell</th>
                  <td><input type="number" name="costredraw1" id="costredraw1" min="-1000" max="1000" value="<?php if (strlen($_GET["costredraw1"]) > 0) {$costredraw1 = $_GET["costredraw1"];} echo $costredraw1; ?>"></td>
                  <td><input type="number" name="costredpct1" id="costredpct1" min="-1000" max="1000" value="<?php if (strlen($_GET["costredpct1"]) > 0) {$costredpct1 = $_GET["costredpct1"];} echo $costredpct1; ?>"> </td>
                </tr>
                <tr>
                  <th>2nd spell</th>
                  <td><input type="number" name="costredraw2" id="costredraw2" min="-1000" max="1000" value="<?php if (strlen($_GET["costredraw2"]) > 0) {$costredraw2 = $_GET["costredraw2"];} echo $costredraw2; ?>"></td>
                  <td><input type="number" name="costredpct2" id="costredpct2" min="-1000" max="1000" value="<?php if (strlen($_GET["costredpct2"]) > 0) {$costredpct2 = $_GET["costredpct2"];} echo $costredpct2; ?>"> </td>
                </tr>
                <tr>
                  <th>3rd spell</th>
                  <td><input type="number" name="costredraw3" id="costredraw3" min="-1000" max="1000" value="<?php if (strlen($_GET["costredraw3"]) > 0) {$costredraw3 = $_GET["costredraw3"];} echo $costredraw3; ?>"></td>
                  <td><input type="number" name="costredpct3" id="costredpct3" min="-1000" max="1000" value="<?php if (strlen($_GET["costredpct3"]) > 0) {$costredpct3 = $_GET["costredpct3"];} echo $costredpct3; ?>"> </td>
                </tr>
                <tr>
                  <th>4th spell</th>
                  <td><input type="number" name="costredraw4" id="costredraw4" min="-1000" max="1000" value="<?php if (strlen($_GET["costredraw4"]) > 0) {$costredraw4 = $_GET["costredraw4"];} echo $costredraw4; ?>"></td>
                  <td><input type="number" name="costredpct4" id="costredpct4" min="-1000" max="1000" value="<?php if (strlen($_GET["costredpct4"]) > 0) {$costredpct4 = $_GET["costredpct4"];} echo $costredpct4; ?>"> </td>
                </tr>
              </table>
            </div>
        </tr>
      </table>

      <br>
    </div>
  <!-- </div> -->
  <!-- ^ -->
  <input class="submitbutton" type="submit" name="submitbutton" value="Calculate">
</form>
</div><br>

<br>
<span class="output">

<?php

// Radiance
$radiancecost1 = 0;
$radiancecost2 = 0;
$radiancecost3 = 0;
$radiancecost4 = 0;
if ($_GET["radiance"] == "checked") {
  $radiance = 1;
  $basecost1 = $one/(1+$costredpct1/100)-$costredraw1;
  $basecost2 = $two/(1+$costredpct2/100)-$costredraw2;
  $basecost3 = $three/(1+$costredpct3/100)-$costredraw3;
  $basecost4 = $four/(1+$costredpct4/100)-$costredraw4;
  if ($costredraw1 < 0 and $costredpct1 < 0) {
    $radiancecost1 = ($basecost1 + $costredraw1*1.2)*(1+($costredpct1*1.2)/100);
  } elseif ($costredraw1 < 0) {
    $radiancecost1 = ($basecost1 + $costredraw1*1.2)*(1+$costredpct1/100);
  } elseif ($costredpct1 < 0) {
    $radiancecost1 = ($basecost1 + $costredraw1)*(1+($costredpct1*1.2)/100);
  } else {
    $radiancecost1 = $one;
  }
  if ($costredraw2 < 0 and $costredpct2 < 0) {
    $radiancecost2 = ($basecost2 + $costredraw2*1.2)*(1+($costredpct2*1.2)/100);
  } elseif ($costredraw2 < 0) {
    $radiancecost2 = ($basecost2 + $costredraw2*1.2)*(1+$costredpct2/100);
  } elseif ($costredpct2 < 0) {
    $radiancecost2 = ($basecost2 + $costredraw2)*(1+($costredpct2*1.2)/100);
  } else {
    $radiancecost2 = $two;
  }
  if ($costredraw3 < 0 and $costredpct3 < 0) {
    $radiancecost3 = ($basecost3 + $costredraw3*1.2)*(1+($costredpct3*1.2)/100);
  } elseif ($costredraw3 < 0) {
    $radiancecost3 = ($basecost3 + $costredraw3*1.2)*(1+$costredpct3/100);
  } elseif ($costredpct3 < 0) {
    $radiancecost3 = ($basecost3 + $costredraw3)*(1+($costredpct3*1.2)/100);
  } else {
    $radiancecost3 = $three;
  }
  if ($costredraw4 < 0 and $costredpct4 < 0) {
    $radiancecost4 = ($basecost4 + $costredraw4*1.2)*(1+($costredpct4*1.2)/100);
  } elseif ($costredraw1 < 0) {
    $radiancecost4 = ($basecost4 + $costredraw4*1.2)*(1+$costredpct4/100);
  } elseif ($costredpct1 < 0) {
    $radiancecost4 = ($basecost4 + $costredraw4)*(1+($costredpct4*1.2)/100);
  } else {
    $radiancecost4 = $four;
  }
  // echo $radiancecost1."<br>".$radiancecost2."<br>".$radiancecost3."<br>".$radiancecost4."<br>";
} else {
  $radiance = 0;
}

// Cycle zu Spell umschreiben
$cyclen = 1; // Cycle length
if ($cycle1 == 1) {
  $cycle1 = $one;
  $radcycle1 = $radiancecost1;
  } elseif ($cycle1 == 2) {
    $cycle1 = $two;
    $radcycle1 = $radiancecost2;
  } elseif ($cycle1 == 3) {
    $cycle1 = $three;
    $radcycle1 = $radiancecost3;
  } elseif ($cycle1 == 4) {
    $cycle1 = $four;
    $radcycle1 = $radiancecost4;
  } else {
    echo "Invalid spell cycle input. Minimum length: 2 spells. First spell has to be defined.<br>";
  }
if ($cycle2 == 1) {
  $cycle2 = $one;
  $radcycle2 = $radiancecost1;
  $cyclen += 1;
  } elseif ($cycle2 == 2) {
    $cycle2 = $two;
    $radcycle2 = $radiancecost2;
    $cyclen += 1;
  } elseif ($cycle2 == 3) {
    $cycle2 = $three;
    $radcycle2 = $radiancecost3;
    $cyclen += 1;
  } elseif ($cycle2 == 4) {
    $cycle2 = $four;
    $radcycle2 = $radiancecost4;
    $cyclen += 1;
  } else {
    echo "Invalid spell cycle input. Minimum length: 2 spells.<br>";
  } if ($cycle3 == 0 and $_GET["cycle1"] == $_GET["cycle2"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  }
if ($cycle2 != 0) {
  if ($cycle3 == 1) {
    $cycle3 = $one;
    $radcycle3 = $radiancecost1;
    $cyclen += 1;
    } elseif ($cycle3 == 2) {
      $cycle3 = $two;
      $radcycle3 = $radiancecost2;
      $cyclen += 1;
    } elseif ($cycle3 == 3) {
      $cycle3 = $three;
      $radcycle3 = $radiancecost3;
      $cyclen += 1;
    } elseif ($cycle3 == 4) {
      $cycle3 = $four;
      $radcycle3 = $radiancecost4;
      $cyclen += 1;
    }
  } else {
    $cycle3 = 0;
    $radcycle3 = 0;
  }
if ($cycle3 != 0) {
  if ($cycle4 == 1 and $_GET["cycle3"] != 0) {
    $cycle4 = $one;
    $radcycle4 = $radiancecost1;
    $cyclen += 1;
    } elseif ($cycle4 == 2) {
      $cycle4 = $two;
      $radcycle4 = $radiancecost2;
      $cyclen += 1;
    } elseif ($cycle4 == 3) {
      $cycle4 = $three;
      $radcycle4 = $radiancecost3;
      $cyclen += 1;
    } elseif ($cycle4 == 4) {
      $cycle4 = $four;
      $radcycle4 = $radiancecost4;
      $cyclen += 1;
    }
  } else {
    $cycle4 = 0;
    $radcycle4 = 0;
  }
if ($cycle4 != 0) {
  if ($cycle5 == 1 and $_GET["cycle4"] != 0) {
    $cycle5 = $one;
    $radcycle5 = $radiancecost1;
    $cyclen += 1;
    } elseif ($cycle5 == 2) {
      $cycle5 = $two;
      $radcycle5 = $radiancecost2;
      $cyclen += 1;
    } elseif ($cycle5 == 3) {
      $cycle5 = $three;
      $radcycle5 = $radiancecost3;
      $cyclen += 1;
    } elseif ($cycle5 == 4) {
      $cycle5 = $four;
      $radcycle5 = $radiancecost4;
      $cyclen += 1;
    }
  } else {
    $cycle5 = 0;
    $radcycle5 = 0;
  }



// Spellcycle ausrechnen
$cyclecost = 0; // Gesamtkosten des Cycles
$radcyclecost = 0; // Selbes mit Radiance

if ($cyclen == 2) {
  $cyclecost = $cycle1 + $cycle2;
  if ($radiance) {
    $radcyclecost = $radcycle1 + $radcycle2;
  }
} elseif ($cyclen == 3) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif ($_GET["cycle2"] == $_GET["cycle3"] or $_GET["cycle2"] == $_GET["cycle1"] or $_GET["cycle3"] == $_GET["cycle1"]) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + 5; // 2x gleich 1x anders
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + 5;
    }
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3; // 3x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3;
    }
  }
} elseif ($cyclen == 4) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 10; // 3x gleich, 1x anders
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + 10;
    }
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle3"] == $_GET["cycle4"]) or ($_GET["cycle1"] == $_GET["cycle4"] and $_GET["cycle2"] == $_GET["cycle3"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 10; // 2x gleich, 2x anders
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + 10;
    }
  } elseif ($_GET["cycle1"] == $_GET["cycle2"] or $_GET["cycle2"] == $_GET["cycle3"] or $_GET["cycle3"] == $_GET["cycle4"]) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 5; // 2x gleich, 2x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + 5;
    }
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4; // 4x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4;
    }
  }
} elseif ($cyclen == 5) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"] and $_GET["cycle1"] == $_GET["cycle5"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"]) or ($_GET["cycle5"] == $_GET["cycle2"] and $_GET["cycle5"] == $_GET["cycle3"] and $_GET["cycle5"] == $_GET["cycle4"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 15; // 4x gleich, 1x anders
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + $radcycle5 + 15;
    }
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle4"] == $_GET["cycle5"]) or ($_GET["cycle5"] == $_GET["cycle4"] and $_GET["cycle5"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle2"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 15; // 3x gleich, 2x anders
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + $radcycle5 + 15;
    }
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle3"] == $_GET["cycle4"] and $_GET["cycle3"] == $_GET["cycle5"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle4"] == $_GET["cycle5"] and $_GET["cycle4"] == $_GET["cycle1"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle5"] == $_GET["cycle1"] and $_GET["cycle5"] == $_GET["cycle2"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 10; // 3x gleich, 2x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + $radcycle5 + 10;
    }
  } elseif (($_GET["cycle1"] == $_GET["cycle2"]) or ($_GET["cycle2"] == $_GET["cycle3"]) or ($_GET["cycle3"] == $_GET["cycle4"]) or ($_GET["cycle4"] == $_GET["cycle5"]) or ($_GET["cycle5"] == $_GET["cycle1"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 5; // 2x gleich, 3x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + $radcycle5 + 5;
    }
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5; // 5x verschieden
    if ($radiance) {
      $radcyclecost = $radcycle1 + $radcycle2 + $radcycle3 + $radcycle4 + $radcycle5;
    }
  }
}

// echo "[Debug]<br>".$cyclecost."<br>".$radcyclecost."<br>";

if ($_GET["transcendence"] == "checked") {
  $cyclecost *= 0.7;
  $radcyclecost *= 0.7;
}
// Mana pro Sekunde ausrechnen
$totalclicks = $cyclen * 3;
$cyclepercentage = $cps / $totalclicks; // Prozentsatz des Cycles der pro Sekunde ausgeführt wird
$ccps = $cyclepercentage * $cyclecost; // cycle cost per second
$radccps = $cyclepercentage * $radcyclecost; // radiance cycle cost per second
$mgps = $mr/5 + $ms/3 + 5; // mana gain per second
if (mr > 0 and ms > 0) {
  $radmgps = ($mr*1.2)/5 + ($ms*1.2)/3 + 5;
} elseif ($mr > 0) {
  $radmgps = ($mr*1.2)/5 + $ms/3 + 5;
} elseif ($ms > 0) {
  $radmgps = $mr/5 + ($ms*1.2)/3 + 5;
} else {
  $radmgps = $mgps;
}

$avgradccps = (8*$radccps + 7*$ccps)/15;
$avgradmgps = (8*$radmgps + 7*$mgps)/15;

// echo "[Debug] Cycle length: ".$cyclen." spells.<br>";
// echo "[Debug] Cycle cost: ".$cyclecost." mana.<br>";
// echo "[Debug] Total clicks: ".$totalclicks.".<br>";
// echo "[Debug] Cyclepercentage: ".$cyclepercentage.".<br>";

?>

<table class='mana'>
  <tr>
    <th>Mana calculation:</th>
  </tr>
  <tr>
    <td>Mana usage per second:</td>
    <td><?php echo round($ccps, 2)." mana"; ?></td>
  </tr>
  <tr>
    <td>Mana gain per second:</td>
    <td><?php echo round($mgps, 2)." mana"; ?></td>
  </tr>
  <tr>
    <td>Total mana per second:</td>
    <td class="ergebnis"><?php echo round ($mgps-$ccps, 2)." mana"; ?></td>
  </tr>
</table>
<?php
if ($_GET["radiance"] == "checked") {
  echo "
  <table class='mana'>
    <tr>
      <th>Radiance:</th>
    </tr>
    <tr>
      <td>Mana usage per second:</td>
      <td>".round($radccps, 2)." mana</td>
    </tr>
    <tr>
      <td>Mana gain per second:</td>
      <td>".round($radmgps, 2)." mana</td>
    </tr>
    <tr>
      <td>Total mana per second:</td>
      <td class='ergebnis'>".round ($radmgps-$radccps, 2)." mana</td>
    </tr>
    <table class='mana'>
      <tr>
        <th>Average Radiance:</th>
      </tr>
      <tr>
        <td>Mana usage per second:</td>
        <td>".round($avgradccps, 2)." mana</td>
      </tr>
      <tr>
        <td>Mana gain per second:</td>
        <td>".round($avgradmgps, 2)." mana</td>
      <tr>
        <td>Total mana per second:</td>
        <td class='ergebnis'>".round ($avgradmgps-$avgradccps, 2)." mana</td>
      </tr>";
}
?>

</span>

<?php
// echo "<script>
// const coll = document.getElementsByClassName('collapsible');
//
// for (let i = 0; i < coll.length; i++) {
//   coll[i].addEventListener('change', function() {
//     this.classList.toggle('active');
//     const content = this.nextElementSibling;
//     if (content.style.maxHeight){
//       content.style.maxHeight = null;
//     } else {
//       content.style.maxHeight = content.scrollHeight + 'px';
//     }
//   });
// }
// </script>";

// if ($_GET["radiance"] == "checked") {
//   echo "Radiance on";
//   echo "<script>
//   "
// }
?>

<script>
const coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    const content = this.nextElementSibling;
    // const content = document.getElementById("expandtable");
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}


// const coll = document.getElementsByClassName("collapsible");
//
// for (let i = 0; i < coll.length; i++) {
//   coll[i].addEventListener("change", function() {
//     this.classList.toggle("active");
//     const content = this.nextElementSibling;
//     if (content.style.maxHeight){
//       content.style.maxHeight = null;
//     } else {
//       content.style.maxHeight = content.scrollHeight + "px";
//     }
//   });
// }
</script>

<script>
// const coll = document.getElementsByClassName("submitbutton");
//
// for (let i = 0; i < coll.length; i++) {
//   coll[i].addEventListener("mouseover", function() {
//     this.classList.toggle("active");
//     const content = this.nextElementSibling;
//     if (content.style.maxHeight){
//       content.style.maxHeight = null;
//     } else {
//       content.style.maxHeight = content.scrollHeight + "px";
//     }
//   });
// }
</script>

<div class="credits">Made by Ingo#5621 with help from Phanta#1328</div>
</body>
</html>
