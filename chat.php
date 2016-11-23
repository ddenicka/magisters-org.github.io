<?php
$file = "chat.txt";
$f = file($file);
$lines = count(file($file));

$q = $lines-1;
$e = $lines-2;
$r = $lines-3;
$t = $lines-4;
$y = $lines-5;
$u = $lines-6;
$i = $lines-7;
$o = $lines-8;
$p = $lines-9;
$w = $lines-10;

echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$w]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$p]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$o]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$i]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$u]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$y]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$t]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$r]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$e]."</div>";
echo "<div style='border-bottom: dotted 1px #DCDCDC;display: flex;'>".$f[$q]."</div>";

?>