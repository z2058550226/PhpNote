<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/29
 * Time: 14:19
 */

function acronym($matches)
{
    $acronyms = array("WWW" => "World Wide Web", "IRS" => "Internal Revenue Service", "PDF" => "Portable Document Format");

    if (isset($acronyms[$matches[1]])) {
        return $matches[1] . "{" . $acronyms[$matches[1]] . "}";
    } else {
        return $matches[1]."ssss";
    }
}

$text = "The <p>IRS</p> offers tax forms in <p>PDF</p> format on the <p>WWW</p>";

$newText = preg_replace_callback("/<p>(.*)<\/p>/U", 'acronym', $text);

print_r($newText);//The IRS{Internal Revenue Service} offers tax forms in PDF{Portable Document Format} format on the WWW{World Wide Web}