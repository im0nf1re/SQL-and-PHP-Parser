<?php


namespace Parser;


class ParserByTags extends Parser
{
    private array $neededTags = [];

    public function __construct(array $neededTags = []) {
        $this->neededTags = $neededTags;

    }

    protected function isTagCorrect(string $tag) : bool {
        return (preg_match('/^[a-z]+$/i', $tag) && $this->isTagNeeded($tag) && !stripos($tag, '.'));
    }

    private function isTagNeeded(string $tag) : bool {
        return (empty($this->neededTags) || in_array($tag, $this->neededTags));
    }
}