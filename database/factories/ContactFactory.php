<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'contact_name' => $faker->name,
        'contact_email' => $faker->unique()->safeEmail,
        'contact_subject' => $faker->word(),
        'contact_message'=> $faker->sentence(),
'contact_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),

    ];
});
