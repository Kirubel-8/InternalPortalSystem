<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('users.index', compact('users'));
    }

    public function toggleStatus($id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Prevent deactivating yourself
            if ($user->id === auth()->id()) {
                return response()->json(['error' => 'You cannot change your own status!'], 403);
            }
            
            $user->is_active = !$user->is_active;
            $user->save();
            
            return response()->json([
                'success' => true,
                'status' => $user->is_active ? 'active' : 'deactivated',
                'message' => "User {$user->name} has been " . ($user->is_active ? 'activated' : 'deactivated') . " successfully!"
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Prevent deleting yourself
            if ($user->id === auth()->id()) {
                return redirect()->route('users.index')->with('error', 'You cannot delete your own account!');
            }
            
            $user->delete();
            
            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }
}