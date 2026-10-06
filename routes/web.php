<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function (Request $request) {

    $search = $request->input('search');

    $products = Product::with('category')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('brand', 'like', '%' . $search . '%')
                  ->orWhere('color', 'like', '%' . $search . '%');
        })
        ->latest()
        ->take(10)
        ->get();

    return view('dashboard', [
        'productCount' => Product::count(),
        'categoryCount' => Category::count(),
        'orderCount' => Order::count(),
        'products' => $products,
        'search' => $search,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin-only', function () {
        return 'Halaman Admin: akses berhasil.';
    });

});

Route::middleware(['auth', 'role:admin,editor'])->group(function () {

    Route::get('/editor-area', function () {
        return 'Halaman Admin/Editor: akses berhasil.';
    });

});

Route::middleware('auth')->group(function () {

    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

});

require __DIR__.'/auth.php';