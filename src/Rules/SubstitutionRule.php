<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

class SubstitutionRule
{
    private string $from;
    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function apply(string $text): string
    {
        return str_replace($this->from, $this->to, $text);
    }
}
