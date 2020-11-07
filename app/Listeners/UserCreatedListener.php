<?php
/**
 * Created by PhpStorm.
 * User: BERTRAND_Guillaume
 * Date: 2018-12-02
 * Time: 18:34
 */

namespace App\Listeners;
use App\Events\UserCreated;
use App\Mail\UserCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class UserCreatedListener /*implements ShouldQueue*/{
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'sqs';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'user_created_mails';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $userCreatedEvent
     * @return void
     */
    public function handle(UserCreated $userCreatedEvent)
    {
        Mail::to($userCreatedEvent->user->email)->send(new UserCreatedMail($userCreatedEvent->user));
    }

    /** Handle a job failure.
    *
    * @param  \App\Events\UserCreated  $userCreatedEvent
    * @param  \Exception  $exception
    * @return void
    */
    public function failed(UserCreated $userCreatedEvent, $exception)
    {
        //
    }
}