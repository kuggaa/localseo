<?php
require_once 'Services/W3C/HTMLValidator.php';

$v = new Services_W3C_HTMLValidator();
$u = 'http://www.w3c.org/';
$r = $v->validate($u);

if ($r->isValid()) {
    echo $u.' is valid!';
} else {
    echo $u.' is NOT valid!';
}
?>
