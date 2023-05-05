<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
class AddQuiz extends Notification
{
    use Queueable;
    //  private $details;
     private $quiz;
   

    public function __construct(Quiz $quiz)
    {
        $this->Quiz=$quiz;
    }

  
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
          
            'id'=>$this->Quiz->id,
            'title'=>' تم اضافة اختبار جديد',
            
        ];
    }
}
