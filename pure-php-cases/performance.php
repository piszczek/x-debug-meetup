<?php

$string = str_repeat('a', 1000);
$maxChars = 500;
$repeat = 1000 * 1000 * 50;

$start = microtime(true);
for ($i = 0; $i < $repeat; $i++) {
    strlen($string) <= $maxChars;
}

?>

<table border="1">
    <tr>
        <td>X-Debug</td>
        <td>
            <?= function_exists('xdebug_is_enabled') && xdebug_is_enabled() ? 'ENABLED' : 'DISABLED' ?>
        </td>
    </tr>
    <tr>
        <td>Cookie Set</td>
        <td>
            <?= isset($_COOKIE['XDEBUG_SESSION']) ? 'YES':'NO' ?>
        </td>
    </tr>
    <tr>
        <td>Execution time</td>
        <td><?= microtime(true) - $start ?></td>
    </tr>
</table>

