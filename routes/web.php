<?php

use Illuminate\Support\Facades\Route;

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');


Route::get('/clear-cache', [App\Http\Controllers\ToolsController::class, 'clearCache'])->name('tools.clear-cache');
Route::get('/staff/load-more', [App\Http\Controllers\PageController::class, 'loadMoreStaff']);
Route::get('/staff/{id}', [App\Http\Controllers\PageController::class, 'getbyid'])
    ->name('staff.show');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/api/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Email Verification (public link clicked from email)
Route::get('/email/verify', [App\Http\Controllers\AuthController::class, 'verifyEmail'])->name('email.verify');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('dashboard.profile');
    Route::put('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('dashboard.profile.update');
    
    // Wallet and Earnings
    Route::get('/dashboard/earnings', [App\Http\Controllers\WalletController::class, 'index'])->name('dashboard.earnings');
    Route::post('/dashboard/withdraw', [App\Http\Controllers\WalletController::class, 'withdraw'])->name('dashboard.withdraw');
    // Bookings
    Route::post('/book-partner/{profile_id}', [App\Http\Controllers\BookingController::class, 'initiate'])->name('book.partner');
    Route::post('/book-partner/callback', [App\Http\Controllers\BookingController::class, 'callback'])->name('book.callback');
    Route::get('/booking-success', [App\Http\Controllers\BookingController::class, 'success'])->name('booking.success');
    Route::get('/dashboard/bookings', [App\Http\Controllers\DashboardController::class, 'bookings'])->name('dashboard.bookings');
    // Email verification send (auth-protected)
    Route::post('/email/send-verification', [App\Http\Controllers\AuthController::class, 'sendVerificationEmail'])->name('email.send-verification');
});

// Route::get('partners', [App\Http\Controllers\PageController::class, 'partners'])->name('partners');
Route::get('partners-profile/{profile_id}', [App\Http\Controllers\PageController::class, 'partnerProfile'])->name('partners.profile');

Route::get('/backup-db', function () {
    $dbName = env('DB_DATABASE', 'soulmate');
    $dbUser = env('DB_USERNAME', 'root');
    $dbPass = env('DB_PASSWORD', '');

    $filename = "backup-" . date('Y-m-d-H-i-s') . ".sql";
    $path = storage_path('app/' . $filename);

    $command = "c:\xampp\mysql\bin\mysqldump.exe -u {$dbUser}";
    if (!empty($dbPass)) {
        $command .= " -p{$dbPass}";
    }
    $command .= " {$dbName} > \"{$path}\"";

    $output = [];
    $returnVar = null;
    exec($command, $output, $returnVar);

    if ($returnVar !== 0) {
        return "Backup failed. Command: {$command}";
    }

    return response()->download($path)->deleteFileAfterSend(true);
})->name('backup.db');

Route::get('/{slug?}', [App\Http\Controllers\PageController::class, 'show'])
    ->where('slug', '^(?!admin|livewire|api|storage|assets|favicon|_debugbar).*$')
    ->name('page.show');