<?php

namespace Dillowhenrick\Leetspeakmagic\Rules;

/**
 * Immutable substitution rule for leetspeak transformations.
 *
 * Replaces occurrences of one string with another during encoding,
 * and can reverse the transformation during decoding.
 *
 * @final
 */
final class SubstitutionRule implements ReversibleRule
{
    /**
     * Creates a new substitution rule.
     *
     * @param string $from The string to be replaced (cannot be empty)
     * @param string $to The replacement string (cannot be empty)
     *
     * @throws \InvalidArgumentException If either parameter is empty
     */
    public function __construct(
        private readonly string $from,
        private readonly string $to
    ) {
        if ($from === '') {
            throw new \InvalidArgumentException('From parameter cannot be empty');
        }
        if ($to === '') {
            throw new \InvalidArgumentException('To parameter cannot be empty');
        }
    }

    /**
     * Applies the substitution rule to the given text.
     *
     * Replaces all occurrences of the 'from' string with the 'to' string.
     *
     * @param string $text The text to transform
     *
     * @return string The transformed text
     */
    public function apply(string $text): string
    {
        return str_replace($this->from, $this->to, $text);
    }

    /**
     * Reverses the substitution rule on the given text.
     *
     * Replaces all occurrences of the 'to' string with the 'from' string.
     *
     * @param string $text The text to reverse-transform
     *
     * @return string The reverse-transformed text
     */
    public function reverse(string $text): string
    {
        return str_replace($this->to, $this->from, $text);
    }
}
