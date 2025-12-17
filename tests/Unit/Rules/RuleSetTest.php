<?php

use Dillowhenrick\Leetspeakmagic\Rules\RuleSet;
use Dillowhenrick\Leetspeakmagic\Rules\SubstitutionRule;

it('can apply multiple rules in sequence', function () {
    $ruleSet = new RuleSet([
        new SubstitutionRule('a', '4'),
        new SubstitutionRule('e', '3'),
    ]);

    expect($ruleSet->applyRules('apple'))->toBe('4ppl3');
});

it('can add rules via builder', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('o', '0'))
        ->build();

    expect($ruleSet->applyRules('hello'))->toBe('hell0');
});

it('applies rules in order', function () {
    $ruleSet = new RuleSet([
        new SubstitutionRule('a', 'b'),
        new SubstitutionRule('b', 'c'),
    ]);

    expect($ruleSet->applyRules('a'))->toBe('c');
});

it('handles empty rule set', function () {
    $ruleSet = new RuleSet();

    expect($ruleSet->applyRules('test'))->toBe('test');
});

it('can be built using builder pattern', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('a', '4'))
        ->addRule(new SubstitutionRule('e', '3'))
        ->build();

    expect($ruleSet->applyRules('apple'))->toBe('4ppl3');
});

it('handles complex rule compositions', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('a', '4'))
        ->addRule(new SubstitutionRule('e', '3'))
        ->addRule(new SubstitutionRule('i', '1'))
        ->addRule(new SubstitutionRule('o', '0'))
        ->addRule(new SubstitutionRule('s', '5'))
        ->build();

    expect($ruleSet->applyRules('awesome'))->toBe('4w350m3');
});

it('handles unicode in rule sets', function () {
    $ruleSet = new RuleSet([
        new SubstitutionRule('é', 'e'),
        new SubstitutionRule('ñ', 'n'),
    ]);

    expect($ruleSet->applyRules('café español'))->toBe('cafe espanol');
});

it('handles empty builder', function () {
    $ruleSet = RuleSet::builder()->build();

    expect($ruleSet->applyRules('test'))->toBe('test');
});

it('applies many rules efficiently', function () {
    $builder = RuleSet::builder();

    foreach (range('a', 'z') as $letter) {
        $builder->addRule(new SubstitutionRule($letter, strtoupper($letter)));
    }

    $ruleSet = $builder->build();

    expect($ruleSet->applyRules('hello world'))->toBe('HELLO WORLD');
});

it('handles real leetspeak encoding', function () {
    $ruleSet = RuleSet::builder()
        ->addRule(new SubstitutionRule('e', '3'))
        ->addRule(new SubstitutionRule('a', '4'))
        ->addRule(new SubstitutionRule('o', '0'))
        ->addRule(new SubstitutionRule('l', '1'))
        ->build();

    expect($ruleSet->applyRules('hello world'))->toBe('h3110 w0r1d');
});

it('can access rules via getter', function () {
    $rule1 = new SubstitutionRule('a', '4');
    $rule2 = new SubstitutionRule('e', '3');
    $ruleSet = new RuleSet([$rule1, $rule2]);

    expect($ruleSet->getRules())->toBe([$rule1, $rule2]);
});
