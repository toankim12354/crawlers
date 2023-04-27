<?php

abstract class BaseParser implements ParserInterface
{
protected string $url;
protected string $title;
protected string $content;
protected string $date;

    public function __construct($url)
    {
        $this->url = $url;
    }
    /**
     * check url
     * @return string
     */
//Get the HTML content
    public function getHtml(): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
//Get the elements in the HTML document

    /**
     * get class check html document
     * @param string $class
     * @return string|null
     */
    protected function getElementsByClass(string $class): ?string
    {
        $html = $this->getHtml();
        if (!empty($html)) {
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($html);
            libxml_clear_errors();
            $finder = new DomXPath($dom);
            $node = $finder->query("//*[contains(@class, '$class')]")->item(0);
            if ($node) {
                return $this->innerHTML($node);
            }
        }
        return null;
    }

    /**
     * get the innerHTML of a node
     *
     * @param DOMNode $node
     * @return string
     */
    public function innerHTML(DOMNode $node): string
    {
        return strip_tags(implode(array_map([$node->ownerDocument, "saveHTML"],
            iterator_to_array($node->childNodes))));
    }

    /**
     * Parse html to array or null  if html is null
     * @return array|null
     * @throws Exception
     */
    public function parse(): ?array
    {
        $html = $this->getHtml();
        if (!empty($html)) {
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($html);
            libxml_clear_errors();
            $title = $this->getElementsByClass($this->title);
            $content = $this->getElementsByClass($this->content);
            $date = $this->getElementsByClass($this->date);
            return ['title' => $title, 'content' => $content, 'date' => $date];
        }
        return null;
    }
}
