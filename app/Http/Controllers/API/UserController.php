<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function currentuser()
    {
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    public function index()
    {
        $users = User::with(['role'])->get();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'surname' => 'required|max:100',
            'name_user' => 'required|max:100',
            'pseudo' => 'required|max:100',
            'date_of_birth' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
        ]);

        $filename = "";
        if ($request->hasFile('image_profile')) {
            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_profile')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }


        $user = User::create(array_merge($request->all(), ['image_profile' => $filename]));

        return response()->json([
            'status' => 'Success',
            'data' => $user,
        ]);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function addressByUserId($user)
    {
        $address = Address::where('user_id', $user)->get();
        return response()->json($address);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'surname' => 'required|max:100',
            'name_user' => 'required|max:100',
            'pseudo' => 'required|max:100',
            'date_of_birth' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
        ]);

        $user->update($request->all());

        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'Supprimer avec succès avec succèss'
        ]);
    }
}
