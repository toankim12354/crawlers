<?php

namespace Crawlers\Models;

use BaseParser;

/**
 *
 */
class DantriParser extends BaseParser
{
    const TITLE_SELECT = 'title-page detail';
    const CONTENT_SELECT = 'singular-content p';
    const DATA_SELECT =  'date';
    public function __construct()
    {

    }


}