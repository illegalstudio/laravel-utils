<?php

namespace Illegal\LaravelUtils\Contracts\Livewire;

/**
 * A sortable trait for livewire list components.
 * Import the trait in your livewire component than:
 * 1. Use the contructor to populate $this->sortDefaultField with the field that should be sorted by default.
 * 2. Use the contructor to populate $this->sortFields with the fields that can be sorted (key = query string field, value = table field).
 *
 * If you want to persist the sort field and direction in the url, use the following code in your livewire component:
 * 1. Declare a protected $queryString array.
 * 2. Use the contructor to populate the $queryString array with the sortField and sortDirection.
 *
 * For example:
 * ```php
 * $this->queryString = [
 *     'sortField'     => ['except' => $this->sortDefaultField],
 *     'sortDirection' => ['except' => $this->sortDirection]
 * ];
 * ```
 */
trait Sortable
{
    /**
     * @var string $sortDefaultField The default sort field.
     */
    public string $sortDefaultField = "";

    /**
     * @var string $sortField The current sort field.
     */
    public string $sortField = "";

    /**
     * @var string $sortDirection The current sort direction.
     */
    public string $sortDirection = 'desc';

    /**
     * @var array $sortFields The fields that can be sorted.
     */
    public array $sortFields = [];

    /**
     * Sort the table by the given field.
     *
     * @param string $field The field to sort by.
     * @return void
     */
    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField     = $field;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * Get the sort array.
     *
     * @return array The sort array, first value is the field and the second value is the direction.
     */
    protected function getSort(): array
    {
        /**
         * Allow only fields that are in the $sortFields array and direction can only be asc or desc
         */
        $this->sortField     = in_array($this->sortField, $this->sortFields) ? $this->sortField : $this->sortDefaultField;
        $this->sortDirection = in_array($this->sortDirection, ['asc', 'desc']) ? $this->sortDirection : 'desc';

        return [$this->sortField, $this->sortDirection];
    }
}
