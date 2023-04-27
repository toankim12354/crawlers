<?php

use Crawlers\Models\DantriParser;
use Crawlers\Models\VietnamnetParser;
use Crawlers\Models\VnexpressParser;

/**
 * @throws Exception
 */
class ParserFactory
{
    /**
     * @throws Exception
     */
    public function CheckLink($url): ParserInterface
    {
        return match (true) {
            str_contains($url, "tri.com.vn") => new DantriParser(
                $url,
                'title-page detail',
                'singular-content p',
                'date'
            ),
            str_contains($url, "vietnamnet.vn") => new VietnamnetParser(
                $url,
                'content-detail-title',
                'main-content',
                'bread-crumb-detail__time'
            ),
            str_contains($url, "express.net") => new VnexpressParser(
                $url,
                'title-detail',
                'fck_detail',
                'date'
            ),
            default => throw new Exception('Invalid parser type'),
        };
    }
}

