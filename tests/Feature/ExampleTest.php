<?php

it('returns a successful response', function () {
    $response = $this->get('/tickets');

    $response->assertStatus(200);
});
