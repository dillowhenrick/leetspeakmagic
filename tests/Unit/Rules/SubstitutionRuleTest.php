<?php

use Dillowhenrick\Leetspeakmagic\Rules\SubstitutionRule;

it('can apply a substitution rule', function () {
    $rule = new SubstitutionRule('a', '4');

    expect($rule->apply('cat'))->toBe('c4t');
});

it('can reverse a substitution rule', function () {
    $rule = new SubstitutionRule('a', '4');

    expect($rule->reverse('c4t'))->toBe('cat');
});

it('rejects empty from parameter', function () {
    expect(fn() => new SubstitutionRule('', '4'))
        ->toThrow(InvalidArgumentException::class, 'From parameter cannot be empty');
});

it('rejects empty to parameter', function () {
    expect(fn() => new SubstitutionRule('a', ''))
        ->toThrow(InvalidArgumentException::class, 'To parameter cannot be empty');
});

it('handles multi-character substitutions', function () {
    $rule = new SubstitutionRule('hello', 'h3ll0');

    expect($rule->apply('hello world'))->toBe('h3ll0 world');
    expect($rule->reverse('h3ll0 world'))->toBe('hello world');
});

it('is case sensitive', function () {
    $rule = new SubstitutionRule('a', '4');

    expect($rule->apply('Apple'))->toBe('Apple')
        ->and($rule->apply('apple'))->toBe('4pple');
});

it('handles special characters', function () {
    $rule = new SubstitutionRule('!', '@');

    expect($rule->apply('Hello!'))->toBe('Hello@');
    expect($rule->reverse('Hello@'))->toBe('Hello!');
});

it('handles unicode characters', function () {
    $rule = new SubstitutionRule('é', 'e');

    expect($rule->apply('café'))->toBe('cafe');
    expect($rule->reverse('cafe'))->toBe('café');
});

it('handles whitespace in substitutions', function () {
    $rule = new SubstitutionRule(' ', '_');

    expect($rule->apply('hello world'))->toBe('hello_world');
    expect($rule->reverse('hello_world'))->toBe('hello world');
});

it('handles multiple occurrences', function () {
    $rule = new SubstitutionRule('o', '0');

    expect($rule->apply('ooo'))->toBe('000');
    expect($rule->reverse('000'))->toBe('ooo');
});

it('handles real leetspeak transformations', function () {
    $rule = new SubstitutionRule('e', '3');

    expect($rule->apply('leet'))->toBe('l33t');
    expect($rule->reverse('l33t'))->toBe('leet');
});
