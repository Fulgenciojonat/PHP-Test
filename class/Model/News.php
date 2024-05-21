<?php

declare(strict_types=1);

namespace TestProject\Class\Model;

use InvalidArgumentException;
use TestProject\Class\Interfaces\ContentInterface;
use DateTimeInterface;

/**
 * Class News
 *
 * Represents a news entity within the system.
 *
 * @package TestProject\Class\Model
 */
class News implements ContentInterface
{
    /**
     * @var string Unique identifier for the news
     */
    protected string $id;

    /**
     * @var string The title of the news
     */
    protected string $title;

    /**
     * @var string The content of the news
     */
    protected string $body;

    /**
     * @var string Timestamp indicating when the news was created
     */
    protected string $createdAt;

    /**
     * @var string Timestamp indicating when the news was last updated
     */
    protected string $updatedAt;

    /**
     * @var string Timestamp indicating when the news was deleted
     */
    protected string $deletedAt;

    /**
     * Creates a new instance of News from an associative array of attributes.
     *
     * @param array $attributes Associative array of news properties
     * @return ContentInterface
     */
    public static function createFromArray(array $attributes): ContentInterface
    {
        if (!isset($attributes['id'], $attributes['body'], $attributes['createdAt'])) {
            throw new InvalidArgumentException('Missing required attributes');
        }

        return (new static())
            ->setId($attributes['id'])
            ->setTitle($attributes['title'])
            ->setBody($attributes['body'])
            ->setCreatedAt(new \DateTime($attributes['createdAt']));
    }

    /**
     * Gets the ID of the news.
     *
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * Sets the ID of the news.
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
     * Gets the title of the news.
     *
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * Sets the title of the news.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Gets the body of the news.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * Sets the body of the news.
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
     * Gets the creation timestamp of the news.
     *
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Sets the creation timestamp of the news.
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
     * Gets the last updated timestamp of the news.
     *
     * @return string
     */
    public function updatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Sets the last updated timestamp of the news.
     *
     * @param DateTimeInterface $updatedAt
     * @return self
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt->format('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Gets the deletion timestamp of the news.
     *
     * @return string
     */
    public function deletedAt(): string
    {
        return $this->deletedAt;
    }

    /**
     * Sets the deletion timestamp of the news.
     *
     * @param DateTimeInterface $deletedAt
     * @return self
     */
    public function setDeletedAt(DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt->format('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Converts the news object to an associative array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'title' => $this->getTitle(),
            'body' => $this->body(),
            'createdAt' => $this->createdAt(),
            'updatedAt' => $this->updatedAt(),
            'deletedAt' => $this->deletedAt()
        ];
    }

    /**
     * Converts the news object to a JSON string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return \json_encode($this->toArray());
    }
}