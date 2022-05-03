<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Positus\Laravel\Client;

class ResolverWhatsapp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (array_key_exists('messages', $this->data)) {
            //$name = $this->data['contacts'][0]['profile']['name'];
            $wa_id = $this->data['contacts'][0]['wa_id'];
            $number = Client::number('6334ea09-d3fe-4689-8acb-684eb0d0ec78', true);
            $message = $number->sendText('+' . $wa_id, 'Hola JORGE');

            logger($message->body());
        }
    }
}
