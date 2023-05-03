<?php

namespace Crawlers\Controllers;
use Global\Singleton;
use Crawlers\Controllers\Controller;
use Crawlers\Models\DatabaseInterface;
use Exception;
use ParserFactory;

class  BaseController extends Controller
{
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    /**
     * @return void
     */
    public function load(): void
    {
        try {
            $url = $_POST['url'] ?? '';

            /**
             * @var ParserFactory $parser
             */
            $factory = Global\Singleton::getInstance('factory');
            $dabase = Gobal\Singleton::getInstance('dabase');
            $parser = null;
            if (str_contains($url, "dantri.com.vn")) {
                $parser = $factory->create('dantri');
            } elseif (str_contains($url, "vietnamnet.vn")) {
                $parser = $factory->create('vietnamnet');
            } elseif (str_contains($url, "vnexpress.net")) {
                $parser = $factory->create('vnexpress');
            }
            $parser->initData(['url' => $url]);
            $data = $parser->parse();

            if ($data !== null) {
                $inserted = $this->database->insert('wrapper', $data);
                if ($inserted === false) {
                    echo "Insert to database failed";
                } else {
                    echo "Insert to database success";
                }
            } else {
                echo "Empty data";
            }
        } catch (Exception $e) {
            var_dump($e->getMessage(), $parser);
            echo "Crawl failed";
        }
    }

    /**
     * @return void
     */
    public function form(): void
    {
        $this->view('index');
    }
}