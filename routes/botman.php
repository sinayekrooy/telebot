<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('/countdown', function ($bot) {
    $user = $bot->getUser();
    // Access ID
    $id = $user->getId();
    $firstname = $user->getFirstName();
    $lastname = $user->getLastName();

    session(['userId' => $di, 'username' => $firstname . ' ' . $lastname ]);

    $bot->reply('session(userId)');
    $bot->reply(session('userId'));
});


$botman->hears('/start', function ($bot) {
    $bot->reply('your chat has been started!');
    $botman->say('Message', '85433011', TelegramDriver::class);
});


$botman->say('Message', '85433011', TelegramDriver::class);