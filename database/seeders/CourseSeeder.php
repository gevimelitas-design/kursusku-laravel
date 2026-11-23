<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['WEB-101', 'Web Dasar', 300000, 25, 'open'],
            ['PHP-101', 'PHP Fundamental', 400000, 25, 'open'],
            ['LRV-101', 'Laravel Dasar', 500000, 20, 'open'],
            ['SQL-101', 'MySQL Dasar', 350000, 30, 'open'],
            ['UI-101', 'Bootstrap UI', 300000, 25, 'draft'],
            ['JS-101', 'JavaScript Dasar', 400000, 20, 'open'],
            ['AJAX-101', 'jQuery dan Ajax', 450000, 20, 'draft'],
            ['API-101', 'REST API Dasar', 550000, 18, 'closed'],
            ['GIT-101', 'Git dan GitHub', 250000, 30, 'open'],
            ['WEB-102', 'Web Modern Lanjut', 600000, 20, 'open'],
            ['LRV-102', 'Laravel Eloquent', 550000, 20, 'open'],
            ['SQL-102', 'Optimasi Query MySQL', 450000, 22, 'closed'],
            ['PHP-102', 'OOP PHP Praktis', 420000, 25, 'open'],
            ['UI-102', 'Desain Responsif', 350000, 25, 'draft'],
            ['JS-102', 'JavaScript ES6', 450000, 20, 'open'],
            ['API-102', 'Autentikasi API', 500000, 18, 'closed'],
            ['SEC-101', 'Keamanan Web Dasar', 500000, 20, 'draft'],
            ['TST-101', 'Pengujian Aplikasi Web', 400000, 20, 'open'],
            ['DEP-101', 'Deployment Linux Server', 600000, 15, 'closed'],
            ['NET-101', 'Jaringan Komputer Praktis', 450000, 25, 'open'],
            ['CLD-101', 'Dasar Cloud Computing', 550000, 20, 'draft'],
            ['DOC-101', 'Dokumentasi Teknis', 250000, 30, 'open'],
            ['UX-101', 'Riset UX Pemula', 350000, 25, 'closed'],
            ['PRJ-101', 'Manajemen Proyek TI', 450000, 25, 'draft'],
        ];

        foreach ($courses as $i => $item) {
            Course::updateOrCreate(
                ['code' => $item[0]],
                [
                    'name' => $item[1],
                    'description' => 'Data latihan Kursusku.',
                    'fee' => $item[2],
                    'quota' => $item[3],
                    'start_date' => now()->addDays(7 + ($i * 7))->toDateString(),
                    'status' => $item[4],
                ]
            );
        }
    }
}