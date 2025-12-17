<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

final class RuleSet
{
    /**
     * @var SubstitutionRule[]
     */
    private array $rules;

    /**
     * @param SubstitutionRule[] $rules
     */
    public function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }

    public static function builder(): RuleSetBuilder
    {
        return new RuleSetBuilder();
    }

    /**
     * @return SubstitutionRule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function applyRules(string $text): string
    {
        $result = $text;
        foreach ($this->rules as $rule) {
            $result = $rule->apply($result);
        }

        return $result;
    }
}
