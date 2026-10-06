<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Post::class);

        return 'Daftar Post - akses diizinkan.';
    }

    public function create()
    {
        Gate::authorize('create', Post::class);

        return 'Form tambah Post - akses diizinkan.';
    }

    public function show(Post $post)
    {
        Gate::authorize('view', $post);

        return 'Detail Post - akses diizinkan.';
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        return 'Form edit Post - akses diizinkan.';
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        return 'Post berhasil dihapus.';
    }
}