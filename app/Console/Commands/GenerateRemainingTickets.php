<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Models\TicketTypes;

class GenerateRemainingTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-remaining-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 9,000 Tickets of the type IS_COURTESY_ADULT';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 1; $i <= 9000; $i++) {
            Ticket::create([
                'type' => TicketTypes::IS_COURTESY_ADULT_SECOND_BATCH,
                'cluster_id' => uniqid(),
            ]);
        }
    }
}
