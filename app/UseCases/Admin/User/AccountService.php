<?php
/**
 * User: Gamma-iron
 * Date: 19.02.2019
 */

namespace App\UseCases\Admin\User;


use App\Http\Requests\Admin\User\AccountRequest;
use App\UseCases\Admin\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService extends Service
{

    public function update(AccountRequest $request): ?bool
    {
        $user = Auth::user();

        $user->fill($request->except(['primary_media', 'password']));

        if($request->password){
            $user->password =  Hash::make($request->password);
        }

        return $this->transaction(function () use ($user, $request){

            $this->updatePrimaryPhoto($user, $request->all());

            $user->updateSeo($request->all());

            return $user->save();
        });
    }
}
