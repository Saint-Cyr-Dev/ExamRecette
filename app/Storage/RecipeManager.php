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

    public function addRecipe(Recipe $recipe)
    {
        return $this->storage->store($recipe);
    }

    public function updateRecipe(Recipe $recipe)
    {
        return $this->storage->update($recipe);
    }

    public function deleteRecipe($id)
    {
        return $this->storage->delete($id);
    }

    public function getRecipe($id)
    {
        return $this->storage->get($id);
    }

    public function getRecipes()
    {
        return $this->storage->all();
    }
}
