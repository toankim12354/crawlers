<?php

namespace Crawlers\Models;

use BaseParser;

class VnexpressParser extends BaseParser
{

    const TITLE_SELECT = 'title-detail';
    const CONTENT_SELECT = 'content-select';
    const DATA_SELECT = 'data-select';

    public function __construct()
    {
    }

}