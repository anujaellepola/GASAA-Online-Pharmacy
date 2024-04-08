<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = isset($_POST['user_message']) ? $_POST['user_message'] : '';

    if (!empty($userMessage)) {
        $botResponse = "You said: $userMessage";
        echo json_encode(['bot_response' => $botResponse]);
        exit;
    } else {
        echo json_encode(['error' => 'Empty message']);
        exit;
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

?>
