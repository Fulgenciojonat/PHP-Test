<?php

namespace TestProject\Utils;

use TestProject\Class\Interfaces\DBClient;
use TestProject\Class\Model\Comment;

class CommentManager extends BaseRepository
{
    public function __construct(DBClient $db)
    {
        parent::__construct($db, 'comment');
    }

    /**
     * Lists all comments.
     *
     * @return array An array of Comment objects representing the listed comments.
     */
    public function listComments(): array
    {
        $rows = $this->list();
        $comments = [];

        foreach ($rows as $row) {
            $comment = Comment::createFromArray($row);
            $comments[] = $comment;
        }

        return $comments;
    }

    /**
     * Adds a comment for a news item.
     *
     * @param Comment $comment The comment to add.
     * @return int The ID of the newly added comment.
     */
    public function addCommentForNews(Comment $comment): int
    {
        $data = [
            'body' => $comment->body(),
            'createdAt' => $comment->createdAt(),
            'newsId' => $comment->newsId()
        ];
        return $this->save($data);
    }

    /**
     * Deletes a comment.
     *
     * @param string $id The ID of the comment to delete.
     * @return int The number of affected rows in the database after deletion.
     */
    public function deleteComment(string $id): int
    {
        return $this->delete($id);
    }
}