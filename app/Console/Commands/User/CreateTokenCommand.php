<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;

class CreateTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-token {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        //$id = $this->argument('id');
        //$token = User::findOrFail($id)->createToken('default')->plainTextToken;

        $email = $this->argument('email');

        if(!$email) {

            $email = $this->ask('Give me an email or id');
        }

        if(is_numeric($email)){
            $user = User::find($email);
        } else {
            $user = User::query()
                ->where('email', $email)
                ->first();
        }

        if(!$user){
            $this->error('User not found');
            return 1;
        }

        $token = $user->createToken('default')->plainTextToken;

        $this->line($token);

        return 0;
    }
}
