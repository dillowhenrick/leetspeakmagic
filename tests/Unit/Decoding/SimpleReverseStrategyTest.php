<?php

use Dillowhenrick\Leetspeakmagic\Decoding\SimpleReverseStrategy;
use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;
use Dillowhenrick\Leetspeakmagic\Rules\SubstitutionRule;

it('can decode leetspeak by reversing rules', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('e', '3'))
        ->addRule(new SubstitutionRule('a', '4'))
        ->addRule(new SubstitutionRule('o', '0'))
        ->build();

    $strategy = new SimpleReverseStrategy();
    $result = $strategy->decode('h3ll0', $ruleSet);

    expect($result->isSuccessful())->toBeTrue()
        ->and($result->getText())->toBe('hello')
        ->and($result->getConfidence())->toBe(1.0);
});

it('reverses rules in correct order', function () {
    $ruleSet = new RuleSet([
        new SubstitutionRule('a', 'b'),
        new SubstitutionRule('b', 'c'),
    ]);

    $strategy = new SimpleReverseStrategy();
    $result = $strategy->decode('c', $ruleSet);

    expect($result->getText())->toBe('a');
});

it('handles empty text', function () {
    $ruleSet = new RuleSet([new SubstitutionRule('a', '4')]);

    $strategy = new SimpleReverseStrategy();
    $result = $strategy->decode('', $ruleSet);

    expect($result->getText())->toBe('');
});
