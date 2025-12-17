<?php

namespace Dillowhenrick\Leetspeakmagic;

use Dillowhenrick\Leetspeakmagic\Decoding\DecodingStrategy;
use Dillowhenrick\Leetspeakmagic\Decoding\SimpleReverseStrategy;
use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;

/**
 * Immutable decoder for leetspeak text.
 *
 * Uses a configurable decoding strategy to transform leetspeak text
 * back to normal text based on a set of rules.
 *
 * @final
 */
final class Decoder
{
    /**
     * Creates a new decoder with the specified rules and strategy.
     *
     * @param RuleSet $ruleSet The set of transformation rules
     * @param DecodingStrategy $strategy The decoding strategy to use
     */
    public function __construct(
        private readonly RuleSet $ruleSet,
        private readonly DecodingStrategy $strategy
    ) {
    }

    /**
     * Creates a new decoder with default configuration.
     *
     * Uses an empty rule set and SimpleReverseStrategy.
     *
     * @return self A new decoder instance
     */
    public static function create(): self
    {
        return new self(new RuleSet(), new SimpleReverseStrategy());
    }

    /**
     * Creates a new decoder with different rules.
     *
     * Returns a new decoder instance with the specified rules,
     * keeping the same decoding strategy.
     *
     * @param RuleSet $ruleSet The new rule set to use
     *
     * @return self A new decoder instance
     */
    public function withRules(RuleSet $ruleSet): self
    {
        return new self($ruleSet, $this->strategy);
    }

    /**
     * Decodes the given leetspeak text.
     *
     * @param string $text The leetspeak text to decode
     *
     * @return Result The decoding result containing decoded text and metadata
     */
    public function decode(string $text): Result
    {
        return $this->strategy->decode($text, $this->ruleSet);
    }
}
