<?php

/**
 * This is a library to facilitate the smooth
 * communication in times of war, between
 * Roksh - the petite village of farmers, and
 * Zrytk - the fairly large village of blacksmiths and hunters
 * Roksh is under massive assault from the four neighbouring
 * villages - Slyek, Doek, Maroek and Groech.
 * Rokshites need to be able to securely pass messages to and
 * from their Zrytk saviours without standing the risk of
 * the assailants intercepting.
 */


/**
 * Performs encryption procedure on input message
 * @param $msg
 * @return string
 */
function encrypt($msg) {
    doShuffle($msg);

    $msg = strrev($msg);
    $msg = chunkText( strrev( bin2hex($msg)), 10);

    doShuffle($msg);
    return $msg;
}

/**
 * Performs decryption procedure on input message
 * @param $msg
 */
function decrypt($msg) {
    doShuffle($msg, true);
    deleteSpaces($msg);

    $msg = strrev(hex2bin(strrev($msg)));

    doShuffle($msg, true);
    return $msg;
}

/**
 * Breaks up input string into tokens
 * Delimiter: [space]
 * @param $msg
 * @return array
 */
function tokenize($msg) {
    $tokens = preg_split('/\s+/', $msg);
    return $tokens;
}

/**
 * Implements the shuffling algorithm on supplied string
 * @param $str  supplied string
 * @param bool $is_decrypt when true, implements the decryption variant
 * @return string|supplied
 */
function shuffleString($str, $is_decrypt = false) {
    $l = strlen($str);
    if ($l == 1) return $str;
    $val = "";

    $x = ($l % 2 == 0)? $l / 2 : (
        $is_decrypt? floor($l / 2):ceil($l / 2)
    );
    $val = substr($str, $x) . substr($str, 0, $x);
    return $val;
}

/**
 * Spaces out given non-spaced string, breaking it randomly into chunks
 * @param string $msg
 */
function chunkText($msg, $maxlen = 5) {
    $maxlen = $maxlen <= 0? 5:$maxlen;
    $txt = "";
    while ($msg != '') {
        $r = rand(1, $maxlen);
        $txt .= substr($msg, 0, $r) . " ";
        $msg = substr($msg, $r);
    }
    return trim($txt);
}

/**
 * Deletes all spaces in input text
 * @param string &$msg
 */
function deleteSpaces(&$msg) {
    $msg = preg_replace("/\s+/", "", $msg);
}

/**
 * Performs the shuffling routine on input text, forwards & backwards
 * @param string $msg
 * @param boolean [$backwards = false] If true, sets the routine for decryption
 */
function doShuffle(&$msg, $backwards = false) {
    $tokens = tokenize($msg);
    foreach ($tokens as $i => $token)
        $tokens[$i] = shuffleString($token, $backwards);
    $msg = implode(" ", $tokens);
}
