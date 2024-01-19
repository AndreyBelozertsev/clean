<?php 
namespace Domain\Auth\Actions;

use Domain\Auth\Models\User;
use Domain\Auth\DTOs\NewUserDTO;
use Illuminate\Auth\Events\Registered;
use Domain\Auth\Contracts\RegisterNewUserContract;



class RegisterNewUserAction implements RegisterNewUserContract
{
    public function __invoke(NewUserDTO $data){
       
        $user = User::query()->create([
            'name'=>$data->name,
            'email'=>$data->email,
            'password'=>bcrypt($data-> password)
        ]);

        event(new Registered($user));

        auth()->login($user);
    }
}