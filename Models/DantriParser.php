<?php
namespace Crawlers\Models;
use BaseParser;

class DantriParser extends BaseParser {

    public function __construct(string $url,string$title,string$content,string $date) {
        parent::__construct($url,$title,$content,$date);
    }


}