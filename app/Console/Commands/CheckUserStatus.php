<?php

namespace App\Console\Commands;

use App\Service\PaymentService;
use Illuminate\Console\Command;

class CheckUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkuserstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For Auto Inactive the Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param PaymentService $paymentService
     * @return mixed
     */
    public function handle(PaymentService $paymentService)
    {
        $paymentService->inactiveUsers();
    }
}
