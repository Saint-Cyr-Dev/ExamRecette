<?php

namespace App\Models;

use DateTime;

class Recipe
{
    protected $id;
    protected $created_at;
    protected $name;
    protected $description;
    protected $people;
    protected $preparation_time;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->created_at;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPeople(): ?int
    {
        return $this->people;
    }

    public function getPreparationTime(): ?int
    {
        return $this->preparation_time;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPeople(int $people): void
    {
        $this->people = $people;
    }

    public function setPreparationTime(int $preparation_time): void
    {
        $this->preparation_time = $preparation_time;
    }
}
