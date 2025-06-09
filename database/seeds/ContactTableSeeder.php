<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample contacts
        for ($i = 1; $i <= 10; $i++) {
            Contact::create([
                'contact_name' => 'Contact Person ' . $i,
                'contact_email' => 'contact' . $i . '@example.com',
                'contact_subject' => 'Sample Subject ' . $i,
                'contact_message' => 'This is a sample message from contact ' . $i,
                'contact_date' => now()->subDays(rand(1, 30))
            ]);
        }
    }
}
