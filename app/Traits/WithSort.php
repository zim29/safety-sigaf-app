<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait WithSort
{
    /**
     * Indicates the field to sort.
     *
     * @var string
     */
    public string | null $sortField = null;

    /**
     * Indicates the direction to sort.
     *
     * @var string
     */
    public string $sortDirection = 'ASC';


    /**
     * Set the sort field for a query.
     *
     * This method assigns a specified column name to the 'sortField' variable,
     * which is used to determine the sorting order of the query results.
     * 
     * @param  string  $field  The name of the column to be used for sorting.
     */
    public function sortBy(string $field) : void
    {
        if( !isset($this->sortField) ) 
        {
            $this->sortField = $field;
        }
        
        if( $this->sortField === $field ) 
        {
            $this->toggleDirection();
        } 
        else 
        {
            $this->sortField = $field;
            $this->sortDirection = 'ASC';
        }

        $this->resetPage();

    }

    protected function toggleDirection () : void
    {
        $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
    }

}
