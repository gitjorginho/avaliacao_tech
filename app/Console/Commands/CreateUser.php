<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criando novo usuario';

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
     * @return int
     */
    public function handle()
    {

        $email = $this->ask('Qual seu email: ');
        $password = $this->secret('Senha: ');
        User::create([
            'email'=>$email,
            'password'=> Hash::make($password)
        ]);
        $this->info('Usuario criado com sucesso');

        return 0;
    }
}
