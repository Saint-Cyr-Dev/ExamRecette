<?php

namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class SessionRecipeStorage implements RecipeStorageInterface
{
    protected $sessionKey = 'recipes';

    public function all()
    {
        return $_SESSION[$this->sessionKey] ?? [];
    }

    public function delete($id)
    {
        $recipes = $this->all();
        unset($recipes[$id]);
        $_SESSION[$this->sessionKey] = $recipes;
    }

    public function get($id)
    {
        $recipes = $this->all();
        return $recipes[$id] ?? null;
    }

    public function store(Recipe $recipe)
    {
        $recipes = $this->all();
        $id = max(array_keys($recipes)) + 1; // Generate unique ID
        $recipe->setId($id);
        $recipes[$id] = $recipe;
        $_SESSION[$this->sessionKey] = $recipes;
        return $id;
    }

    public function update(Recipe $recipe)
    {
        $recipes = $this->all();
        $id = $recipe->getId();
        if (isset($recipes[$id])) {
            $recipes[$id] = $recipe;
            $_SESSION[$this->sessionKey] = $recipes;
        } else {
            throw new \Exception("Recipe with ID $id not found.");
        }
    }
}
