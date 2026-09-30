<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$booking = \App\Models\Booking::latest()->first();
$partner = $booking->partner;
$settings = \App\Models\CommissionSetting::first();

echo "Booking ID: " . $booking->id . "\n";
echo "Partner Gender: " . $partner->gender . "\n";
echo "Settings Eligible Genders (raw): " . $settings->eligible_gender . "\n";
$eligibleGenders = is_string($settings->eligible_gender) ? json_decode($settings->eligible_gender, true) : $settings->eligible_gender;
if (empty($eligibleGenders)) $eligibleGenders = ['female'];
echo "Eligible Genders (parsed): " . implode(',', $eligibleGenders) . "\n";

$isCommissionBased = !in_array($partner->gender, $eligibleGenders);
echo "Is Commission Based: " . ($isCommissionBased ? 'true' : 'false') . "\n";
