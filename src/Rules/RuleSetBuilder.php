<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

final class RuleSetBuilder
{
    /**
     * @var SubstitutionRule[]
     */
    private array $rules = [];

    public function addRule(SubstitutionRule $rule): self
    {
        $this->rules[] = $rule;

        return $this;
    }

    public function build(): RuleSet
    {
        return new RuleSet($this->rules);
    }
}
