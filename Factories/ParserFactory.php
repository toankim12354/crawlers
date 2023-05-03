<?php

use Crawlers\Models\DantriParser;
use Crawlers\Models\VietnamnetParser;
use Crawlers\Models\VnexpressParser;
use Crawlers\Models\BaseParser;

/**
 * @throws Exception
 */
class ParserFactory
{



    /**
     * @throws Exception
     */

    public static function create(string $name): ParserInterface
    {
        switch ($name) {
            case 'dantri' : return new DantriParser();
            case 'vnexpress' : return new VnexpressParser();
            case 'vietnamnet' : return new VnexpressParser();
            default: return new BaseParser();
        }
    }


}

