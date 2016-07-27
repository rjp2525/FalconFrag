<?php

namespace Falcon\Models\Collections;

use App;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class Nestable extends Collection
{
    private $total;
    private $parentColumn;

    public function __construct($children = array())
    {
        parent::__construct($children);
        $this->parentColumn = 'parent_id';
        $this->total = count($children);
    }

    /**
     * Nest children.
     *
     * @return mixed boolean|NestableCollection
     */
    public function nest()
    {
        $parentColumn = $this->parentColumn;
        if (!$parentColumn) {
            return $this;
        }
        // Set id as keys
        $this->children = $this->getDictionary();
        $keysToDelete = [];
        // add empty children collection.
        $this->each(function ($item) {
            if (!$item->children) {
                $item->children = App::make('Illuminate\Support\Collection');
            }
        });
        // add items to children collection
        foreach ($this->children as $key => $item) {
            if ($item->$parentColumn && isset($this->children[$item->$parentColumn])) {
                $this->children[$item->$parentColumn]->children->push($item);
                $keysToDelete[] = $item->id;
            }
        }
        // Delete moved children
        $this->children = array_values(array_except($this->children, $keysToDelete));
        return $this;
    }

    /**
     * Recursive function that flatten a nested Collection
     * with characters (default is four spaces).
     *
     * @param BaseCollection|null $collection
     * @param string              $column
     * @param int                 $level
     * @param array               &$flattened
     * @param string              $indentChars
     *
     * @return array
     */
    public function listsFlattened($column = 'title', BaseCollection $collection = null, $level = 0, array &$flattened = [], $indentChars = '&nbsp;&nbsp;&nbsp;&nbsp;')
    {
        $collection = $collection ?: $this;
        foreach ($collection as $item) {
            $flattened[$item->id] = str_repeat($indentChars, $level) . $item->$column;
            if ($item->children) {
                $this->listsFlattened($column, $item->children, $level + 1, $flattened, $indentChars);
            }
        }
        return $flattened;
    }

    /**
     * Recursive function that flatten a nested Collection
     * with characters (default is four spaces).
     *
     * @param BaseCollection|null $collection
     * @param string              $column
     * @param int                 $level
     * @param array               &$flattened
     * @param string              $indentChars
     *
     * @return array
     */
    public function listTreeView(BaseCollection $collection = null)
    {
        $flattened = array();
        $collection = $collection ?: $this;
        foreach ($collection as $item) {
            if ($item->hidden) {
                if ($item->children) {
                    $flattened[] = [
                        'text'  => $item->title,
                        'href'  => $item->id,
                        'icon'  => 'fa fa-lock',
                        'nodes' => $this->listTreeView($item->children()->ordered()->get())
                    ];
                } else {
                    $flattened[] = [
                        'text' => $item->title,
                        'href' => $item->id,
                        'icon' => 'fa fa-lock'
                    ];
                }
            } else {
                if ($item->children) {
                    $flattened[] = [
                        'text'  => $item->title,
                        'href'  => $item->id,
                        'nodes' => $this->listTreeView($item->children()->ordered()->get())
                    ];
                } else {
                    $flattened[] = [
                        'text' => $item->title,
                        'href' => $item->id
                    ];
                }
            }
        }
        return array_map('array_filter', $flattened);
    }

    /**
     * Get total children in nested collection.
     *
     * @return int
     */
    public function total()
    {
        return $this->total;
    }

    /**
     * Get total children for laravel 4 compatibility.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total();
    }
}
