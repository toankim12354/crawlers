<?php

namespace Crawlers\Controllers;

 use Exception;


 class BaseController extends Controller
 {


     /**
      * @throws Exception
      */
     public function checkUrl($url): array
     {

         $Link = (new \ParserFactory)->CheckLink($url);
         $contents = file_get_contents($url);

         if ($contents === false) {
             return (['error' => 'Failed to fetch URL']);
         } else {

             return (['success' => 'URL was fetched successfully']);
         }

     }

 }