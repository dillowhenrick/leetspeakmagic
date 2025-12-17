<?php

namespace Dillowhenrick\Leetspeakmagic\Decoding;

use Dillowhenrick\Leetspeakmagic\Result;
use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;

/**
 * Interface for leetspeak decoding strategies.
 *
 * Implementations define how leetspeak text should be decoded
 * using a given set of transformation rules.
 */
interface DecodingStrategy
{
    /**
     * Decodes leetspeak text using the provided rule set.
     *
     * @param string $text The leetspeak text to decode
     * @param RuleSet $ruleSet The transformation rules to apply
     *
     * @return Result The decoding result with text and confidence
     */
    public function decode(string $text, RuleSet $ruleSet): Result;
}
