<?php

namespace Dillowhenrick\Leetspeakmagic;

final class Result
{
    /**
     * @param array<int, string> $alternatives
     */
    private function __construct(
        private readonly bool $successful,
        private readonly ?string $text,
        private readonly float $confidence,
        private readonly array $alternatives,
        private readonly ?string $errorMessage
    ) {
    }

    /**
     * @param array<int, string> $alternatives
     */
    public static function success(string $text, float $confidence, array $alternatives = []): self
    {
        if ($confidence < 0 || $confidence > 1) {
            throw new \InvalidArgumentException('Confidence must be between 0 and 1');
        }

        return new self(
            successful: true,
            text: $text,
            confidence: $confidence,
            alternatives: $alternatives,
            errorMessage: null
        );
    }

    public static function failure(string $errorMessage): self
    {
        return new self(
            successful: false,
            text: null,
            confidence: 0.0,
            alternatives: [],
            errorMessage: $errorMessage
        );
    }

    public function isSuccessful(): bool
    {
        return $this->successful;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getConfidence(): float
    {
        return $this->confidence;
    }

    /**
     * @return array<int, string>
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
