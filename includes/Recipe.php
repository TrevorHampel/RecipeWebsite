<?php

/**
 * Recipe contains info about a specific recipe that is pulled from 
 * the MealDB API.  The $id is a unique identifier.
 */
class Recipe
{
    private $id;
    private $name;
    private $category;
    private $instructions;
    private $thumbnail;
    private $ingredientMap;
    private $recipeSource;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

    public function setThumbnail($url)
    {
        $this->thumbnail = $url;
    }

    public function setRecipeSource($source)
    {
        $this->recipeSource = $source;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function getRecipeSource()
    {
        return $this->recipeSource;
    }

    public function setMap($map)
    {
        $this->ingredientMap = $map;
    }

    public function getMap()
    {
        return $this->ingredientMap;
    }
}
