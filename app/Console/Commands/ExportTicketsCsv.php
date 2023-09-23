<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Ticket;
use App\Models\TicketTypes;


class ExportTicketsCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-tickets-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Tickets data as CSV';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tickets = Ticket::where('type',TicketTypes::IS_COURTESY_ADULT_SECOND_BATCH)->get();
        $csvFileName = 'tickets.csv';
        $csvFile = fopen($csvFileName, 'w');

        // Add CSV header
        fputcsv($csvFile, ['QR']);

        // Add Ticket data to CSV
        foreach ($tickets as $ticket) {
            fputcsv($csvFile, [$ticket->cluster_id]);
        }

        fclose($csvFile);

        $this->info("Tickets data exported to $csvFileName");

        $storagePath = storage_path('app/csv');
        if (!File::isDirectory($storagePath)) {
            File::makeDirectory($storagePath, 0777, true, true);
        }

        $csvFilePath = $storagePath . '/' . $csvFileName;
        File::move($csvFileName, $csvFilePath);

        $this->info("Tickets data exported to $csvFilePath");
    }
}
