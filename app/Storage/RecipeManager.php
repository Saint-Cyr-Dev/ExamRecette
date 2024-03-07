<?php

namespace App;
use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class RecipeManager
{
    protected $storage;

    public function __construct(RecipeStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function addRecipe(Recipe $recipe): int
    {
        return $this->storage->store($recipe);
    }

    public function getRecipe(int $id): ?Recipe
    {
        return $this->storage->get($id);
    }

    public function updateRecipe(Recipe $recipe): void
    {
        $this->storage->update($recipe);
    }

    public function deleteRecipe(int $id): void
    {
        $this->storage->delete($id);
    }

    public function getRecipes(): array
    {
        return $this->storage->all();
    }
}

?>