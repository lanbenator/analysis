<?php

include '../vendor/autoload.php';

use analysis\filter\SelectFilter;
use analysis\value\Value;

$sf = new SelectFilter(
    "id",
    "name",
    array( new Value("vid", "vname", "filterdb") )
);

echo $sf->printValues();

?>