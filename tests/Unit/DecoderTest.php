<?php

use Dillowhenrick\Leetspeakmagic\Decoder;
use Dillowhenrick\Leetspeakmagic\Decoding\SimpleReverseStrategy;
use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;
use Dillowhenrick\Leetspeakmagic\Rules\SubstitutionRule;

it('can decode leetspeak text', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('e', '3'))
        ->addRule(new SubstitutionRule('l', '1'))
        ->addRule(new SubstitutionRule('o', '0'))
        ->build();

    $decoder = new Decoder($ruleSet, new SimpleReverseStrategy());
    $result = $decoder->decode('h3110 w0r1d');

    expect($result->isSuccessful())->toBeTrue()
        ->and($result->getText())->toBe('hello world');
});

it('can decode with fluent interface', function () {
    $result = Decoder::create()
        ->withRules(RuleSet::builder()
            ->addRule(new SubstitutionRule('a', '4'))
            ->addRule(new SubstitutionRule('e', '3'))
            ->build())
        ->decode('t3st');

    expect($result->getText())->toBe('test');
});

it('handles real leetspeak examples', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('e', '3'))
        ->addRule(new SubstitutionRule('a', '4'))
        ->addRule(new SubstitutionRule('l', '1'))
        ->addRule(new SubstitutionRule('t', '7'))
        ->addRule(new SubstitutionRule('o', '0'))
        ->addRule(new SubstitutionRule('s', '5'))
        ->build();

    $decoder = new Decoder($ruleSet, new SimpleReverseStrategy());

    expect($decoder->decode('1337 5p34k')->getText())->toBe('leet speak')
        ->and($decoder->decode('h4ck3r')->getText())->toBe('hacker');
});
