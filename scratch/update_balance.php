<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$user = App\Models\User::where('email', 'rachna@gmail.com')->first();
$user->wallet_balance = 2000;
$user->save();
echo "Balance updated";
