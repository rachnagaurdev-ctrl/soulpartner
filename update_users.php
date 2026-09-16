<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$cats = \App\Models\Category::pluck('slug')->toArray();
if (empty($cats)) die("No categories found\n");

foreach(\App\Models\User::all() as $user) {
    // If it's a single string with spaces like "Dining Companion", it won't be in the slugs.
    // If it's empty, we give them some random categories.
    $user->category = implode(',', \Illuminate\Support\Arr::random($cats, rand(1, 3)));
    $user->save();
}
echo "Done\n";
