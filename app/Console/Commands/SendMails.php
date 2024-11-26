<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendMails extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'users:sendmails';

   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Send Mails To All Users';

   /**
    * Execute the console command.
    */
    
   public function handle()
   {
      $usersmail = User::select('email')->get();
      $emails = [];

      foreach ($usersmail as $mail) {
         $emails[] = $mail['email'];
      }

      Mail::send('emails.welcome', [], function ($message) use ($emails) {
         $message->to($emails)
            ->subject('Welcome to Our Cron Platform');
      });
   }
}
