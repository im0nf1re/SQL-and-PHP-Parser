<?php
include 'Parser/Parser.php';
include 'Parser/ParserByTags.php';

use Parser\Parser;
use Parser\ParserByTags;

include 'html/form.php';

if (isset($_GET['submit'])) {

    $parser = '';
    if (!empty($_GET['needed_tags'])) {
        $parser = new ParserByTags(explode(', ', $_GET['needed_tags']));
    } else {
        $parser = new Parser();
    }

    $parsedElements = $parser->parseByUrl($_GET['url']);

    include 'html/table.php';
}

