<?php

namespace Dillowhenrick\Leetspeakmagic\Decoding;

use Dillowhenrick\Leetspeakmagic\Result;
use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;

final class SimpleReverseStrategy implements DecodingStrategy
{
    public function decode(string $text, RuleSet $ruleSet): Result
    {
        $decoded = $text;

        // Apply rules in reverse order using reverse() method
        foreach (array_reverse($ruleSet->getRules()) as $rule) {
            $decoded = $rule->reverse($decoded);
        }

        return Result::success($decoded, 1.0);
    }
}
