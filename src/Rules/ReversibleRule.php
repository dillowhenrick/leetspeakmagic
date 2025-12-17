<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

/**
 * Interface for reversible transformation rules.
 *
 * Rules implementing this interface can transform text in both directions:
 * apply() for encoding and reverse() for decoding.
 */
interface ReversibleRule
{
    /**
     * Applies the rule transformation to the given text.
     *
     * @param string $text The text to transform
     *
     * @return string The transformed text
     */
    public function apply(string $text): string;

    /**
     * Reverses the rule transformation on the given text.
     *
     * @param string $text The text to reverse-transform
     *
     * @return string The reverse-transformed text
     */
    public function reverse(string $text): string;
}
