<?php

include_once("DatabaseObjects/M_recipe.php");

/**
 * PaginatedList is a pseudo-generic class that extends ArrayObject
 * The point of this is to make a dynamic list of items to be able to page based off 
 * of the pageIndex, pageSize and item count.
 * 
 * The goal of this Class is to reduce the number of DB calls we will make on pages like SearchCategory
 * and Favorites.  This works after we have pulled the data from the db into memory and manipulate it 
 * there.  
 * 
 * Still in Testing.
 * 
 * @param $items mixed list or array of objects
 * @param $count number of items in full list
 * @param $pageIndex index of the current page
 * @param $pageSize int value which sets the number of objects per page
 * 
 * @method bool HasPreviousPage returns false if page == 1
 * @method bool HasNextPage return false if page is last page
 * @method PaginatedList CreatePage creates each instance of the page needed based off data in memory.
 */
class PaginatedList extends ArrayObject
{
    public $PageIndex;
    public $TotalPages;

    public ArrayObject $ItemList;

    public function __construct($items, $count, $pageIndex, $pageSize)
    {

        $PageIndex = $pageIndex;
        $TotalPages = (int)ceil($count / (float)$pageSize);

        foreach ($items as $item) {
            $recipe = new M_recipe();
            $recipe = $item;
            $this->ItemList->offsetSet($recipe->recipe_id, $recipe);
        }
    }

    public function HasPreviousPage(): bool
    {
        $val = $this->PageIndex > 1;
        return $val;
    }

    public function HasNextPage(): bool
    {
        $val = $this->PageIndex < $this->TotalPages;
        return $val;
    }

    public function CreatePage($source, $pageIndex, $pageSize): PaginatedList
    {
        $count = $source->count();
        //$itemsToAdd = $source->
        $skip = ($pageIndex - 1) * $pageSize;
        $list = new ArrayObject();
        //Add only items on this 'page'

        for ($i = $skip; $i < $skip + $pageSize; $i++) {
            $list->offsetSet($source->offsetGet($i), $source[$skip]);
        }
        return new PaginatedList($list, $count, $pageIndex, $pageSize);
    }
}
