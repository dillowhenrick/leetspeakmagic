<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

class RuleSet
{
    /**
     * @var SubstitutionRule[]
     */

    public array $rules = [];

    /**
     * @param SubstitutionRule[] $rules
     */

    public function __construct(array $rules = [])
    {
        foreach ($rules as $rule) {
            $this->addRule($rule);
        }
    }

    public function addRule(SubstitutionRule $rule): self
    {
        $this->rules[] = $rule;

        return $this;
    }

    public function applyRule(string $text): string
    {
        $result = $text;
        foreach ($this->rules as $rule) {
            $result = $rule->apply($result);
        }

        return $result;
    }
}
