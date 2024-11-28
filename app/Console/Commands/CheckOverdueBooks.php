<?php

namespace App\Console\Commands;

use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckOverdueBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-overdue-books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if a borrowed book are overdue and update the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();

        // Fetch all borrowed books and check if overdue
        BorrowedBook::where('returned_at', false) // Only check books not yet returned
            ->where('due_date', '<', $today) // Compare due date with today
            ->update(['availability' => "Overdue"]); // Mark as overdue if necessary

        $this->info('Overdue books have been updated.');
    }
}
