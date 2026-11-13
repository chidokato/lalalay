<?php
/**
 * Automated Git Pull / Webhook Deployment Script
 * Website: Lalalay Residences
 */

// Secret key to prevent unauthorized execution
define('DEPLOY_SECRET', 'lalalay_deploy_secret_2026');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check security token via GET parameter or GitHub Webhook signature
$provided_token = $_GET['token'] ?? '';
if (empty($provided_token) && isset($_SERVER['HTTP_X_HUB_SIGNATURE_256'])) {
    // Read raw payload
    $payload = file_get_contents('php://input');
    $hash = 'sha256=' . hash_hmac('sha256', $payload, DEPLOY_SECRET);
    if (hash_equals($hash, $_SERVER['HTTP_X_HUB_SIGNATURE_256'])) {
        $provided_token = DEPLOY_SECRET;
    }
}

if ($provided_token !== DEPLOY_SECRET) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    die("Lỗi 403: Khóa bảo mật không chính xác.");
}

// Set working directory to project root
chdir(__DIR__);

// Execute git commands
$commands = [
    'git status',
    'git pull'
];

$output = "=== LALALAY RESIDENCES AUTO-DEPLOY ===\n";
$output .= "Thời gian: " . date('Y-m-d H:i:s') . "\n\n";

foreach ($commands as $cmd) {
    $output .= "$ {$cmd}\n";
    $result = shell_exec($cmd . ' 2>&1');
    $output .= ($result ?: "(Không có phản hồi từ hệ thống)") . "\n\n";
}

header('Content-Type: text/plain; charset=utf-8');
echo $output;
