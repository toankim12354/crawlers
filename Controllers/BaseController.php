<?php
namespace Crawlers\Controllers;
use Exception;
use Crawlers\Models\DantriParser;
use Crawlers\Models\VnexpressParser;
use Crawlers\Models\VietnamnetParser;


class BaseController
{
    /**
     * @throws Exception
     */
    public  function make(string $url): DantriParser|VietnamnetParser|VnexpressParser
    {
        /**
         *
         */

        return match (true) {
            str_contains($url, "dantri.com.vn") => new DantriParser(
                $url,
                'title-page detail',
                'singular-content p',
                'date'
            ),
            str_contains($url, "vietnamnet.vn") => new VietnamnetParser(
                $url,
                'content-detail-title',
                'container__left not-pl',
                'bread-crumb-detail__time'
            ),
            str_contains($url, "vnexpress.net") => new VnexpressParser(
                $url,
                'title-detail',
                'fck_detail',
                'date'
            ),
            default => throw new Exception('Invalid parser type'),
        };
    }
}