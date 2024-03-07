<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\SessionRecipeStorage;
use App\Storage\MySqlDatabaseRecipeStorage; 
use App\RecipeManager;

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=examrecette", "root", "1234");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mysqlStorage = new MySqlDatabaseRecipeStorage($pdo); 

$sessionStorage = new SessionRecipeStorage();

$storage = $mysqlStorage; 

$manager = new RecipeManager($storage);

$recipe = new Recipe;
$recipe->setCreatedAt(new DateTime())
    ->setName('Fondant au chocolat mi-cuit')
    ->setDescription('La recette du fameux fondant au chocolat mi-cuit.')
    ->setPeople(4)
    ->setPreparationTime(40);
$addedRecipeId = $manager->addRecipe($recipe);

$recipeToUpdate = $manager->getRecipe($addedRecipeId);
$recipeToUpdate->setName('Fondant au chocolat revisité');
$manager->updateRecipe($recipeToUpdate);

$manager->deleteRecipe($addedRecipeId);

$recipes = $manager->getRecipes();
print_r($recipes);
?>
