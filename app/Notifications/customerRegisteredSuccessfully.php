<?php

namespace App\Notifications;
use App\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class customerRegisteredSuccessfully extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(Customer $user)
    {
        
        $this->customer = $user;
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
     $customer = $this->customer;
    $useractivation_code = $customer->activation_code;
        $user = $customer->email;
  
        return (new MailMessage)
                 /*   ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!'); */
            ->subject('Successfully created new account')
            ->greeting(sprintf('Hello %s', $user))
            ->line('You have successfully registered to our resellers program. Please activate your account.')
            ->action('Click Here', route('activate.user', $useractivation_code))
            ->line('Thank you for making business with us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}