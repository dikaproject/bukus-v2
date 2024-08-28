<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class UpdateStudentPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:update-points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update points and stars for all students';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $students = Student::all();
        foreach ($students as $student) {
            $originalPoints = $student->tpoin;
            $student->updatePointsAndStars();  // Ensure this method calculates and updates the tpoin and stars correctly.

            if ($student->wasChanged('tpoin')) {
                Log::info('Updated student points', [
                    'nis' => $student->nis,
                    'originalPoints' => $originalPoints,
                    'newPoints' => $student->tpoin
                ]);
                $this->info("Student NIS: {$student->nis} points updated from {$originalPoints} to {$student->tpoin}");
            }
        }
        return Command::SUCCESS;
    }
}
