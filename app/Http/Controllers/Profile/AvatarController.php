<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequst;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(Request $request, User $user) {
        $avatar = $request->validate(            [
            'avatar'=>'required|image'
        ],[
            'avatar.required'=>'Não selecionou uma imagem',
            'avatar.image'=>'Tens de selecionar um arquivo: png, jpg, jpeg ou svg'
        ]);

        if ($request->hasFile('avatar')) {
           $avatar['avatar'] = $request->file('avatar')->store('avatars', 'public');

           Storage::disk('public')->delete($request->user()->avatar);
        }

        $request->user()->update(['avatar' => $request->file('avatar')->store('avatars', 'public')]);

        return back()->with('messageAvatar', 'Foto Carregada');
    }
}
