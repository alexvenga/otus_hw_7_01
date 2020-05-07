<?php

error_reporting(E_ALL);

require_once dirname(__DIR__).'/vendor/autoload.php';

use AlexVenga\BracketsService\BracketsChecker;
use AlexVenga\BracketsService\Exceptions\EmptySentenceException;
use AlexVenga\BracketsService\Exceptions\InvalidSentenceSymbolsException;

try {
    $bracketsChecker = new BracketsChecker();

    if ($bracketsChecker->check($_POST['string'])) {
        header( "HTTP/1.1 200 OK" );
        echo 'Brackets checked';
        exit;
    }

    header( "HTTP/1.1 400 Bad Request" );
    echo 'Brackets mistake';
    exit;

} catch (EmptySentenceException $e) {
    header( "HTTP/1.1 406 Not Acceptable" );
    echo $e->getMessage();
    exit;
} catch (InvalidSentenceSymbolsException $e) {
    header( "HTTP/1.1 406 Not Acceptable" );
    echo $e->getMessage();
    exit;
} catch (Exception $e) {
    header( "HTTP/1.1 500 Internal Server Error" );
    echo $e->getMessage();
    exit;
}