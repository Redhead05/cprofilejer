<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'question' => 'What is RFJ Law Firm and how does it work?',
                'answer' => 'RFJ Law Firm helps clients understand legal options, map risks, and take strategic action through consultation, case assessment, and ongoing legal support.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How secure is my financial data with RFJ Law Firm?',
                'answer' => 'We treat client documents and financial information as confidential and only process them within controlled legal workflows and secure communication channels.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Can I use RFJ Law Firm for personal and business legal matters?',
                'answer' => 'Yes. RFJ Law Firm can support both individuals and companies, from private disputes to corporate compliance and litigation strategy.',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            FaqItem::query()->updateOrCreate(
                ['question' => $item['question']],
                $item,
            );
        }
    }
}

