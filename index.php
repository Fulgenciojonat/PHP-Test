<?php

//define('ROOT', __DIR__);
//require_once(ROOT . '/utils/NewsManager.php');
//require_once(ROOT . '/utils/CommentManager.php');
//
//foreach (NewsManager::getInstance()->listNews() as $news) {
//	echo("############ NEWS " . $news->getTitle() . " ############\n");
//	echo($news->getBody() . "\n");
//	foreach (CommentManager::getInstance()->listComments() as $comment) {
//		if ($comment->getNewsId() == $news->getId()) {
//			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
//		}
//	}
//}
//
//$commentManager = CommentManager::getInstance();
//$c = $commentManager->listComments();




require 'vendor/autoload.php';

use TestProject\Utils\NewsManager;
use TestProject\Utils\CommentManager;
use TestProject\Utils\MySqlDB;

$db = MySqlDB::create();

$newsManager = new NewsManager($db);
$commentManager = new CommentManager($db);


foreach ($newsManager->listNews() as $news) {
    echo("############ NEWS " . $news->title() . " ############\n");
    echo($news->body() . "\n");
    foreach ($commentManager->listComments() as $comment) {
        if ($comment->getNewsId() == $news->id()) {
            echo("Comment " . $comment->id() . " : " . $comment->body() . "\n");
        }
    }
}

$c = $commentManager->listComments();