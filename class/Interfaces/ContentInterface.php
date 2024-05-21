<?php

declare(strict_types=1);

namespace TestProject\Class\Interfaces;

/**
 * Interface ContentInterface
 * Defines the basic structure for content entities.
 */
interface ContentInterface
{
    /**
     * Gets the ID of the content.
     *
     * @return int
     */
    public function id(): string;

    /**
     * Creates an object instance from an array of attributes.
     *
     * @param array $attributes Associative array of content attributes.
     *
     * @return self Returns an instance of ContentInterface.
     */
    public static function createFromArray(array $attributes): self;

    /**
     * Convert to array.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Convert to string.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Gets the creation date of the content.
     *
     * @return string
     */
    public function createdAt(): string;

    /**
     * Gets the update date of the content.
     *
     * @return string
     */
    public function updatedAt():string;

    /**
     * Gets the deletion date of the content.
     *
     * @return string
     */
    public function deletedAt(): string;

    /**
     * Gets the body of the content.
     *
     * @return string
     */
    public function body(): string;
}