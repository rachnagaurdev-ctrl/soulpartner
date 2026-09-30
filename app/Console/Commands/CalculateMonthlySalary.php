<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateMonthlySalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate {--month=} {--year=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate monthly salary and commission for eligible partners.';

    /**
     * Execute the console command.
     */
    public function handle(\App\Services\SalaryCalculationService $salaryService)
    {
        $month = $this->option('month') ?: now()->subMonth()->month;
        $year = $this->option('year') ?: now()->subMonth()->year;

        $this->info("Calculating salaries for {$month}/{$year}...");
        
        $salaryService->calculateForMonth($month, $year);

        $this->info('Salary calculation completed.');
    }
}
