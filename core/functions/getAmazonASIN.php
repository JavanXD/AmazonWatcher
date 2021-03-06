<?php

/**
 * Gets ASIN by url of a product
 */
function getAmazonASIN($url) {
    $pattern = "%/([a-zA-Z0-9]{10})(?:[/?]|$)%";
    preg_match($pattern, $url, $matches);
    if($matches && isset($matches[1])) {
        $asin = $matches[1];
    } else {
        echo "Couldn't parse url and extract ASIN: {$url}";
        return false;
    }
    return $asin;
}

