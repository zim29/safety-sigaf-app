<?php

namespace App\Traits;

trait WithSearch
{
    /**
     * Indicates the field to search.
     *
     * @var string
     */
    public string $searchField = '';

    /**
     * List of all possible fields available for searching.
     * 
     *  List of all possible fields available for searching.
     *
     * This property is an array where each element represents a searchable field.
     * Each field is defined as an associative array with two keys:
     * - string 'key': The identifier used to refer to the field in search operations.
     * - string 'name': The human-readable name or label of the field, which can be used for display purposes.
     *
     * @var array 
     */
    public array $fields = [];

    /**
     * Indicates the value to search.
     *
     * @var string
     */
    public string $searchValue = '';

    /**
     * Indicates the type of search.
     *
     * @var string
     */
    public string $searchType = 'exactMatch';

   /**
    * Specifies the types of string matching used in the search.
    *
    * This property is an array of string values, each representing a different
    * search matching type. The available types are:
    * - 'startsWith': Searches for strings that start with the given search term.
    * - 'endsWith': Searches for strings that end with the given search term.
    * - 'contains': Searches for strings that contain the given search term anywhere.
    * - 'exactMatch': Searches for strings that exactly match the given search term.
    *
    * These types are used to determine how the search query should match against
    * the searchable fields.
    *
    * @var string[]
    */
   public array $searchTypes = [
       'startsWith',
       'endsWith',
       'contains',
       'exactMatch',
   ];

   public function updatingSearchValue ( string $value )
   {
        if( $this->searchField === '') return;
   }

   public function updatedSearchField ( string $value ) 
   {
        foreach ($this->fields as $key => $field) {
            if ($field['id'] === $value) {
                $this->searchType = $field['type'];
                break;
            }
        }
        $this->resetPage();
   }




}
