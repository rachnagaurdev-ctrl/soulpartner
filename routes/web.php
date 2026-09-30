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

// Password Reset
Route::get('/forgot-password', [App\Http\Controllers\PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\PasswordResetController::class, 'resetPassword'])->name('password.update');

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
    Route::get('/dashboard/reviews', [App\Http\Controllers\DashboardController::class, 'reviews'])->name('dashboard.reviews');
    Route::get('/dashboard/membership', [App\Http\Controllers\DashboardController::class, 'membership'])->name('dashboard.membership');
    Route::post('/dashboard/membership/toggle-autorenew', [App\Http\Controllers\DashboardController::class, 'toggleAutoRenew']);
    Route::get('/dashboard/settings', [App\Http\Controllers\DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::get('/dashboard/salary', [App\Http\Controllers\DashboardController::class, 'salary'])->name('dashboard.salary');
    Route::post('/dashboard/salary/request', [App\Http\Controllers\DashboardController::class, 'submitSalaryRequest'])->name('dashboard.salary.request');
    // Email verification send (auth-protected)
    Route::post('/email/send-verification', [App\Http\Controllers\AuthController::class, 'sendVerificationEmail'])->name('email.send-verification');
    // Chat
    Route::get('/dashboard/messages',           [App\Http\Controllers\ChatController::class, 'index'])->name('dashboard.messages');
    Route::post('/chat/send',                   [App\Http\Controllers\ChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/poll',                    [App\Http\Controllers\ChatController::class, 'poll'])->name('chat.poll');
    Route::get('/chat/unread-count',            [App\Http\Controllers\ChatController::class, 'unreadCount'])->name('chat.unread');

    // Booking Actions
    Route::post('/book/{id}/start', [App\Http\Controllers\BookingController::class, 'startBooking'])->name('booking.start');
    Route::post('/book/{id}/end', [App\Http\Controllers\BookingController::class, 'endBooking'])->name('booking.end');
    Route::post('/book/{id}/cancel', [App\Http\Controllers\BookingController::class, 'cancelBooking'])->name('booking.cancel');
    Route::post('/book/{id}/review', [App\Http\Controllers\BookingController::class, 'submitReview'])->name('booking.review');

    // Video Call API
    Route::post('/video-call/initiate/{bookingId}', [App\Http\Controllers\VideoCallController::class, 'initiate']);
    Route::post('/video-call/{id}/offer', [App\Http\Controllers\VideoCallController::class, 'offer']);
    Route::post('/video-call/{id}/answer', [App\Http\Controllers\VideoCallController::class, 'answer']);
    Route::post('/video-call/{id}/candidate', [App\Http\Controllers\VideoCallController::class, 'candidate']);
    Route::get('/video-call/{id}/poll', [App\Http\Controllers\VideoCallController::class, 'poll']);
    Route::get('/video-call/incoming', [App\Http\Controllers\VideoCallController::class, 'incoming']);
    Route::post('/video-call/{id}/end', [App\Http\Controllers\VideoCallController::class, 'end']);
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