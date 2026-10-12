<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class About extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'title' => json_encode([
                'en' => 'About Me',
                'ja' => '私について',
                'nl' => 'Over mij',
            ], JSON_UNESCAPED_UNICODE),

            'description' => json_encode([
                'en' => 'I am a passionate and dedicated professional who enjoys learning new things, solving problems, and turning ideas into reality. I believe in continuous growth, creativity, and delivering meaningful results through my work.',
                'ja' => '私は、新しいことを学び、問題を解決し、アイデアを形にすることを楽しむ、情熱と向上心を持ったプロフェッショナルです。継続的な成長と創造性を大切にし、自分の仕事を通じて価値ある成果を生み出すことを目指しています。',
                'nl' => 'Ik ben een gepassioneerde en toegewijde professional die graag nieuwe dingen leert, problemen oplost en ideeën tot leven brengt. Ik geloof in voortdurende ontwikkeling, creativiteit en het leveren van waardevolle resultaten met mijn werk.',
            ], JSON_UNESCAPED_UNICODE),

            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
