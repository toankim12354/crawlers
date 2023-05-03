<?php


namespace Crawlers\Models;

use BaseParser;


class VietnamnetParser extends BaseParser
{
    const TITLE_SELECT =  'content-detail-title';
    const CONTENT_SELECT =  'maincontent';
    const DATA_SELECT = 'bread-crumb-detail__time';
    public function __construct()
    {

    }
}