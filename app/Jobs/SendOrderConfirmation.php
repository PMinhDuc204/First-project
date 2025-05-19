<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOrderConfirmation implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $order;

    public function __construct($order)
    {
        //
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->order->email)->send(new OrderConfirmationMail($this->order));
    }
}
