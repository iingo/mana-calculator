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
          <td><input type="checkbox" class="collapsible" id="radiance" name="radiance" value="checked" <?php echo $_GET["radiance"]; ?>>
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

// Cycle zu Spell umschreiben
$cyclen = 1; // Cycle length
if ($cycle1 == 1) {
  $cycle1 = $one;
  } elseif ($cycle1 == 2) {
    $cycle1 = $two;
  } elseif ($cycle1 == 3) {
    $cycle1 = $three;
  } elseif ($cycle1 == 4) {
    $cycle1 = $four;
  } else {
    echo "Invalid spell cycle input. Minimum length: 2 spells. First spell has to be defined.<br>";
  }
if ($cycle2 == 1) {
  $cycle2 = $one;
  $cyclen += 1;
  } elseif ($cycle2 == 2) {
    $cycle2 = $two;
    $cyclen += 1;
  } elseif ($cycle2 == 3) {
    $cycle2 = $three;
    $cyclen += 1;
  } elseif ($cycle2 == 4) {
    $cycle2 = $four;
    $cyclen += 1;
  } else {
    echo "Invalid spell cycle input. Minimum length: 2 spells.<br>";
  } if ($cycle3 == 0 and $_GET["cycle1"] == $_GET["cycle2"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  }
if ($cycle2 != 0) {
  if ($cycle3 == 1) {
    $cycle3 = $one;
    $cyclen += 1;
    } elseif ($cycle3 == 2) {
      $cycle3 = $two;
      $cyclen += 1;
    } elseif ($cycle3 == 3) {
      $cycle3 = $three;
      $cyclen += 1;
    } elseif ($cycle3 == 4) {
      $cycle3 = $four;
      $cyclen += 1;
    }
  } else {
    $cycle3 = 0;
  }
if ($cycle3 != 0) {
  if ($cycle4 == 1 and $_GET["cycle3"] != 0) {
    $cycle4 = $one;
    $cyclen += 1;
    } elseif ($cycle4 == 2) {
      $cycle4 = $two;
      $cyclen += 1;
    } elseif ($cycle4 == 3) {
      $cycle4 = $three;
      $cyclen += 1;
    } elseif ($cycle4 == 4) {
      $cycle4 = $four;
      $cyclen += 1;
    }
  } else {
    $cycle4 = 0;
  }
if ($cycle4 != 0) {
  if ($cycle5 == 1 and $_GET["cycle4"] != 0) {
    $cycle5 = $one;
    $cyclen += 1;
    } elseif ($cycle5 == 2) {
      $cycle5 = $two;
      $cyclen += 1;
    } elseif ($cycle5 == 3) {
      $cycle5 = $three;
      $cyclen += 1;
    } elseif ($cycle5 == 4) {
      $cycle5 = $four;
      $cyclen += 1;
    }
  } else {
    $cycle5 = 0;
  }

// Radiance
if ($_GET["radiance"] == "checked") {
  $basecost1 = $one/(1+$costredpct1/100)-$costredraw1;
  // echo $basecost1;
  $basecost2 = $two/(1+$costredpct2/100)-$costredraw2;
  $basecost3 = $three/(1+$costredpct3/100)-$costredraw3;
  $basecost4 = $four/(1+$costredpct4/100)-$costredraw4;
  // echo "<script>";
  // echo "function() {";
  // echo "  this.classList.toggle('active')";
  // echo "  var content = this.nextElementSibling;";
  // echo "  if (content.style.maxHeight){";
  // echo "    content.style.maxHeight = null;";
  // echo "  } else {";
  // echo "    content.style.maxHeight = content.scrollHeight + 'px';";
  // echo "  }";
  // echo "}";
  // echo "</script>";
}

// Spellcycle ausrechnen
$cyclecost = 0; // Gesamtkosten des Cycles

if ($cyclen == 2) {
  $cyclecost = $cycle1 + $cycle2;
} elseif ($cyclen == 3) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif ($_GET["cycle2"] == $_GET["cycle3"] or $_GET["cycle2"] == $_GET["cycle1"] or $_GET["cycle3"] == $_GET["cycle1"]) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + 5;
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3;
  }
} elseif ($cyclen == 4) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 10; // 3x gleich, 1x anders
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle3"] == $_GET["cycle4"]) or ($_GET["cycle1"] == $_GET["cycle4"] and $_GET["cycle2"] == $_GET["cycle3"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 10; // 2x gleich, 2x anders
  } elseif ($_GET["cycle1"] == $_GET["cycle2"] or $_GET["cycle2"] == $_GET["cycle3"] or $_GET["cycle3"] == $_GET["cycle4"]) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + 5; // 2x gleich, 2x verschieden
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4; // 4x verschieden
  }
} elseif ($cyclen == 5) {
  if ($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"] and $_GET["cycle1"] == $_GET["cycle5"]) {
    echo "Invalid spell cycle input. Has to contain at least 2 different spells.<br>";
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle4"]) or ($_GET["cycle5"] == $_GET["cycle2"] and $_GET["cycle5"] == $_GET["cycle3"] and $_GET["cycle5"] == $_GET["cycle4"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 15; // 4x gleich, 1x anders
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"] and $_GET["cycle4"] == $_GET["cycle5"]) or ($_GET["cycle5"] == $_GET["cycle4"] and $_GET["cycle5"] == $_GET["cycle3"] and $_GET["cycle1"] == $_GET["cycle2"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 15; // 3x gleich, 2x anders
  } elseif (($_GET["cycle1"] == $_GET["cycle2"] and $_GET["cycle1"] == $_GET["cycle3"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle3"] == $_GET["cycle4"] and $_GET["cycle3"] == $_GET["cycle5"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle4"] == $_GET["cycle5"] and $_GET["cycle4"] == $_GET["cycle1"]) or ($_GET["cycle2"] == $_GET["cycle3"] and $_GET["cycle2"] == $_GET["cycle4"]) or ($_GET["cycle5"] == $_GET["cycle1"] and $_GET["cycle5"] == $_GET["cycle2"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 10; // 3x gleich, 2x verschieden
  } elseif (($_GET["cycle1"] == $_GET["cycle2"]) or ($_GET["cycle2"] == $_GET["cycle3"]) or ($_GET["cycle3"] == $_GET["cycle4"]) or ($_GET["cycle4"] == $_GET["cycle5"]) or ($_GET["cycle5"] == $_GET["cycle1"])) {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5 + 5; // 2x gleich, 3x verschieden
  } else {
    $cyclecost = $cycle1 + $cycle2 + $cycle3 + $cycle4 + $cycle5; // 5x verschieden
  }
}

if ($_GET["transcendence"] == "checked") {
  $cyclecost *= 0.7;
}
// Mana pro Sekunde ausrechnen
$ccps = 0; // cycle cost per second
$totalclicks = $cyclen * 3;
$cyclepercentage = $cps / $totalclicks; // Prozentsatz des Cycles der pro Sekunde ausgeführt wird
$ccps = $cyclepercentage * $cyclecost;
$mgps = $mr/5 + $ms/3 + 5; // mana gain per second
// echo "Mana cost per second: ".round($ccps, 2)." mana.<br>";
// echo "Mana gain per second: ".round($mgps, 2)." mana.<br>";
// echo "Total mana per second: ".round ($mgps-$ccps, 2)." mana.<br>";

// echo "[Debug] Cycle length: ".$cyclen." spells.<br>";
// echo "[Debug] Cycle cost: ".$cyclecost." mana.<br>";
// echo "[Debug] Total clicks: ".$totalclicks.".<br>";
// echo "[Debug] Cyclepercentage: ".$cyclepercentage.".<br>";

?>
<table class="mana">
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
    // const content = this.nextElementSibling;
    const content = document.getElementById("expandtable");
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
