<?php

use Dillowhenrick\Leetspeakmagic\Rules\SubstitutionRule;

it('can apply a substitution rule', function () {
    $rule = new SubstitutionRule('a', '4');

    expect($rule->apply('cat'))->toBe('c4t');
});
