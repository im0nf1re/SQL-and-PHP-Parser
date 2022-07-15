<?php

namespace Parser;

class Parser
{
    public function parseByUrl(string $url) : array {
        $htmlArray = str_split(file_get_contents($url));

        $parsedElements = [];
        for ($i = 0; $i < count($htmlArray); $i++) {
            if ($htmlArray[$i] == '<') {
                $newHtmlKey = [];
                $k = $i + 1;
                while (!in_array($htmlArray[$k], [' ', '>', '/', '!'])) {
                    $newHtmlKey[] = $htmlArray[$k];
                    $k++;
                }

                $newHtmlKey = implode($newHtmlKey);

                if (!$this->isTagCorrect($newHtmlKey)) {
                    continue;
                }

                if (array_key_exists($newHtmlKey, $parsedElements)) {
                    $parsedElements[$newHtmlKey]++;
                } else {
                    $parsedElements[$newHtmlKey] = 1;
                }
                $i = $k;
            }
        }

        return $parsedElements;
    }

    protected function isTagCorrect(string $tag) : bool {

        return preg_match('/^[a-z]+$/i', $tag);
    }
}