<?php

namespace TestProject\Utils;

use TestProject\Class\Interfaces\DBClient;
use TestProject\Class\Model\News;

class NewsManager extends BaseRepository
{
    public function __construct(DBClient $db)
    {
        parent::__construct($db, 'news');
    }

    /**
     * Lists all news items.
     *
     * @return array An array of News objects representing the listed news items.
     */
    public function listNews(): array
    {
        $rows = $this->list();
        $news = [];

        foreach ($rows as $row) {
            $news[] = News::createFromArray($row);
        }

        return $news;
    }

    /**
     * Adds a new news item.
     *
     * @param News $news The news item to add.
     * @return int The ID of the newly added news item.
     */
    public function addNews(News $news): int
    {
        $data = [
            'title' => $news->title(),
            'body' => $news->body(),
            'created_at' => date('Y-m-d')
        ];
        return $this->save($data);
    }

    /**
     * Deletes a news item and associated comments.
     *
     * @param string $id The ID of the news item to delete.
     * @return int The number of affected rows in the database after deletion.
     */
	public function deleteNews(string $id)
	{
        $commentManager = new CommentManager($this->db);

        $comments = $commentManager->listComments();

        foreach ($comments as $comment) {
            if ($comment->newsId() == $id) {
                $commentManager->deleteComment($comment->id());
            }
        }

        return $this->delete($id);
	}
}