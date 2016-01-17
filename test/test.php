<?php

use Syhol\Spyglass\Model;
use Syhol\Spyglass\Reader;

include __DIR__ . '/../vendor/autoload.php';

$f = new Reader();

$test = [
    'bloo' => 'blagh',
    'blogh' => 'bling',
    'blat' => [
        'blow' => [
            [
                'blaw' => [
                    'bling' => 'blop1'
                ],
                'blosha' => 'bloting'
            ],
            [
                'blaw' => [
                    'bling' => 'blop2'
                ],
                'blosha' => 'bloting'
            ],
            [
                'blaw' => [
                    'bling' => 'blop3'
                ],
                'blosha' => 'bloting'
            ],
            [
                'blaw' => [
                    'bling' => 'blop4'
                ],
                'blosha' => 'bloting'
            ],
        ],
        'bloon',
        'blann' => 'blanko'
    ]
];

$m = new Model($f, $test);

assert($f->find(null, $test)->export() === $test);
assert($f->find('', $test)->export() === $test);
assert($f->find('blat', $test)->export() === $test['blat']);
assert($f->find('blat.blow', $test)->export() === $test['blat']['blow']);
assert($f->find('blat.blow.0.blaw.bling', $test)->all() === ['blop1']);
assert($f->find('blat.blow.0.blaw.bling', $test)->export() === 'blop1');
assert($f->find('blat.blow.*.blaw.bling', $test)->export() === ['blop1', 'blop2', 'blop3', 'blop4']);
assert($f->find('blat.blow.*.blaw.bling', $test)->exists() === true);
assert($f->find('blat.blow.*.blaw.bling.blue', $test)->exists() === false);

assert($m['blat.blow.0.blaw.bling'] === 'blop1');
assert($m['blat.blow.*.blaw.bling'] === ['blop1', 'blop2', 'blop3', 'blop4']);
assert($m['blat.blow.0.blaw.bling.bop'] === null);
assert($m['blat.blow.*.blaw.bling.bop'] === []);
assert(isset($m['blat.blow.*.blaw.bling']) === true);
assert(isset($m['blat.blow.*.blaw.bling.blue']) === false);
