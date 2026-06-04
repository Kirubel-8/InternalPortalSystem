<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ], [
            'title.required' => 'Title is required',
            'body.required' => 'Content is required',
            'image.image' => 'File must be an image',
            'image.max' => 'Image size should not exceed 5MB',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');
                $post->image = $path;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }

        $post->save();
        // return redirect('/posts')->with('success', 'Announcement posted successfully!');
        return redirect()->route('posts.index')->with('success', 'Announcement posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            try {
                $file = $request->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');
                $post->image = $path;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }

        $post->save();
        // return redirect('/posts')->with('success', 'Announcement updated successfully!');
        return redirect()->route('posts.index')->with('success', 'Announcement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image if exists
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Announcement deleted successfully!');
    }

    /**
     * Delete selected posts.
     */
    public function deleteSelected(Request $request)
    {
        $ids = $request->input('selected_ids', []);

        if (empty($ids)) {
            return redirect()->route('posts.index')->with('warning', 'No items selected');
        }

        $posts = Post::whereIn('id', $ids)->get();

        foreach ($posts as $post) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();
        }

        return redirect()->route('posts.index')->with('success', count($posts) . ' announcement(s) deleted successfully!');
    }

    /**
     * View single blog post.
     */
    public function look($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.blog', compact('post'));
    }

    /**
     * Display blog posts.
     */
    public function blog()
    {
        $blogs = Post::latest()->paginate(10);
        return view('systems', compact('blogs'));
    }
}
