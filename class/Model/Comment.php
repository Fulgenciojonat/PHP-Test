<?php

declare(strict_types=1);

namespace TestProject\Class\Model;

use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use TestProject\Class\Interfaces\ContentInterface;

class Comment implements ContentInterface
{
    /**
     * @var string Unique identifier for the comment
     */
    private string $id;

    /**
     * @var string The content of the comment
     */
    private string $body;

    /**
     * @var string Timestamp indicating when the comment was created
     */
    private string $createdAt;

    /**
     * @var string Timestamp indicating when the comment was last updated
     */
    private string $updatedAt;

    /**
     * @var string Timestamp indicating when the comment was deleted
     */
    private string $deletedAt;

    /**
     * @var string Identifier for the news item to which the comment belongs
     */
    private string $newsId;

    /**
     * Creates a new instance of Comment from an associative array of attributes.
     *
     * @param array $attributes Associative array of comment properties
     * @return ContentInterface
     * @throws InvalidArgumentException|Exception if any of the required attributes are missing
     */
    public static function createFromArray(array $attributes): ContentInterface
    {
        if (!isset($attributes['id'], $attributes['newsId'], $attributes['body'], $attributes['createdAt'])) {
            throw new InvalidArgumentException('Missing required attributes');
        }

        return (new static())
            ->setId($attributes['id'])
            ->setNewsId($attributes['newsId'])
            ->setBody($attributes['body'])
            ->setCreatedAt(new \DateTime($attributes['createdAt']));
    }

    /**
     * Gets the ID of the comment.
     *
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * Sets the ID of the comment.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets the news ID associated with the comment.
     *
     * @return string
     */
    public function newsId(): string
    {
        return $this->newsId;
    }

    /**
     * Sets the news ID for the comment.
     *
     * @param string $newsId
     * @return self
     */
    public function setNewsId(string $newsId): self
    {
        $this->newsId = $newsId;
        return $this;
    }

    /**
     * Gets the creation timestamp of the comment.
     *
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Sets the creation timestamp of the comment.
     *
     * @param DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt->format('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Gets the last updated timestamp of the comment.
     *
     * @return string
     */
    public function updatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Sets the last updated timestamp of the comment.
     *
     * @param DateTimeInterface $updatedAt
     * @return ContentInterface
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): ContentInterface
    {
        $this->updatedAt = $updatedAt->format('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Gets the deletion timestamp of the comment.
     *
     * @return string
     */
    public function deletedAt(): string
    {
        return $this->deletedAt;
    }

    /**
     * Sets the deletion timestamp of the comment.
     *
     * @param DateTimeInterface $deletedAt
     * @return ContentInterface
     */
    public function setDeletedAt(DateTimeInterface $deletedAt): ContentInterface
    {
        $this->deletedAt = $deletedAt->format('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Gets the content of the comment.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * Sets the content of the comment.
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Converts the comment object to an associative array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'newsId' => $this->newsId(),
            'body' => $this->body(),
            'createdAt' => $this->createdAt(),
            'updatedAt' => $this->updatedAt(),
            'deletedAt' => $this->deletedAt()
        ];
    }

    /**
     * Converts the comment object to a JSON string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return \json_encode($this->toArray());
    }
}