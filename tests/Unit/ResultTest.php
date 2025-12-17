<?php

use Dillowhenrick\Leetspeakmagic\Result;

it('can create a successful result', function () {
    $result = Result::success('hello', 0.95);

    expect($result->isSuccessful())->toBeTrue()
        ->and($result->getText())->toBe('hello')
        ->and($result->getConfidence())->toBe(0.95)
        ->and($result->getAlternatives())->toBe([]);
});

it('can create a successful result with alternatives', function () {
    $result = Result::success('hello', 0.95, ['hel1o', 'he11o']);

    expect($result->getAlternatives())->toBe(['hel1o', 'he11o']);
});

it('validates confidence is between 0 and 1', function () {
    expect(fn() => Result::success('test', 1.5))
        ->toThrow(InvalidArgumentException::class, 'Confidence must be between 0 and 1');
});

it('can create a failed result', function () {
    $result = Result::failure('Could not decode');

    expect($result->isSuccessful())->toBeFalse()
        ->and($result->getErrorMessage())->toBe('Could not decode');
});
