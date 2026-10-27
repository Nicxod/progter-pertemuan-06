<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $dbStatus = 'Terkoneksi';
    $dbError = null;
    $userCount = 0;
    $tableList = [];
    $sqliteVer = '3.x';

    try {
        DB::connection()->getPdo();
        $userCount = DB::table('users')->count();
        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name");
        $tableList = array_map(fn($t) => $t->name, $tables);
        $verRow = DB::select("SELECT sqlite_version() as ver");
        if (!empty($verRow)) {
            $sqliteVer = $verRow[0]->ver;
        }
    } catch (\Exception $e) {
        $dbStatus = 'Gagal';
        $dbError = $e->getMessage();
    }

    return view('welcome', [
        'laravelVersion' => app()->version(),
        'phpVersion' => phpversion(),
        'dbStatus' => $dbStatus,
        'dbError' => $dbError,
        'dbName' => config('database.default'),
        'userCount' => $userCount,
        'tableList' => $tableList,
        'sqliteVer' => $sqliteVer,
        'containerHost' => gethostname(),
        'serverIp' => $_SERVER['SERVER_ADDR'] ?? '127.0.0.1',
        'serverPort' => $_SERVER['SERVER_PORT'] ?? '8000',
        'envMode' => config('app.env'),
        'memoryUsage' => round(memory_get_usage(true) / 1024 / 1024, 2) . ' MB',
    ]);
});

Route::get('/api/ping', function () {
    $start = microtime(true);
    DB::select('SELECT 1');
    $latency = round((microtime(true) - $start) * 1000, 3);

    return response()->json([
        'status' => 'ok',
        'database' => 'sqlite',
        'latency_ms' => $latency,
        'timestamp' => now()->toIso8601String(),
    ]);
});
