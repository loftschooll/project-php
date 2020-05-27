<?php

$rows = 10;
$cols = 10;

$table = '<table border="1" align="center" width="250">';

for ($tr = 1; $tr <= $rows; $tr++) {
    $table .= '<tr>';
    for ($td = 1; $td <= $cols; $td++) {
        if (($td % 2 == 0) && ($tr % 2 == 0)) {
            $table .= "<td width='20'>" . '(' .$tr * $td .')' . "</td>\n";
        } elseif (($tr % 2 != 0) && ($td % 2 != 0)) {
            $table .= "<td width='20'>" . '[' .$tr * $td .']' . "</td>\n";
        } else {
            $table .= "<td width='20'>" .$tr * $td . "</td>\n";
        }
    }
    $table .= '</tr>';
}
$table .= '</table>';
echo $table;
