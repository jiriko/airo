<?php

declare(strict_types=1);

use App\User\Models\User;

it('requires authentication', function () {
    $this->postJson(route('tripQuotations.store'), [
        'age' => '18,70',
        'currency_id' => 'USD',
        'start_date' => '2022-01-01',
        'end_date' => '2022-01-10',
    ])->assertUnauthorized();
});

it('creates trip quotation', function () {
    $this->actingAs(User::factory()->create())
        ->postJson(route('tripQuotations.store'), [
            'age' => '18,70',
            'currency_id' => 'USD',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-10',
        ])->assertCreated()
        ->assertJsonMissingPath('data.total_cents')
        ->assertJsonStructure([
            'data' => [
                'quotation_id',
                'currency_id',
                'total',
            ],
        ]);
});

it('requires valid request data', function ($error, $input) {
    $data = array_merge([
        'age' => '18,70',
        'currency_id' => 'USD',
        'start_date' => '2022-01-01',
        'end_date' => '2022-01-10',
    ], [$error => $input]);

    $this->actingAs(User::factory()->create())
        ->postJson(route('tripQuotations.store'), $data)
        ->assertJsonValidationErrors($error);
})->with([
    'invalid age' => ['age', '18,invalid-age'],
    'invalid currency_id' => ['currency_id', 'invalid-currency_id'],
    'invalid start_date' => ['start_date', '2022-13-01'],
    'invalid end_date' => ['end_date', '2022-13-01'],
]);
