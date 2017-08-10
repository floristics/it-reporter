<?php

namespace SleepingOwl\Admin\Display\Column;

use Illuminate\Support\Str;
use Mockery\Matcher\Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use SleepingOwl\Admin\Contracts\Display\OrderByClauseInterface;

class OrderByClause implements OrderByClauseInterface
{
    /**
     * @var string|Closure
     */
    protected $name;

    /**
     * OrderByClause constructor.
     *
     * @param string|Closure $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @param Builder $query
     * @param string $direction
     */
    public function modifyQuery(Builder $query, $direction = 'asc')
    {
        $this->name instanceof \Closure
            ? $this->callCallable($query, $direction)
            : $this->callDefaultClause($query, $direction);
    }

    /**
     * @param string|Closure $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Builder $query
     * @param string $direction
     */
    protected function callCallable(Builder $query, $direction)
    {
        call_user_func_array($this->name, [$query, $direction]);
    }

    /**
     * @param $name
     * @return bool
     */
    protected function isRelationName($name)
    {
        return Str::contains($name, '.');
    }

    /**
     * TODO: EagerLoad.
     */
    protected function eagerLoad()
    {
    }

    /**
     * Load Relations by this->name.
     * @param Builder $query
     * @param $direction
     */
    protected function loadRelationOrder(Builder $query, $direction)
    {
        $relations = collect(explode('.', $this->name));

        //Without Eager Load
        //TODO: With Eager Load
        if ($relations->count() == 2) {
            $model = $query->getModel();
            $relation = $relations->first();

            if (method_exists($model, $relation)) {

                /** @var Relation $relationClass */
                $relationClass = $model->{$relation}();
                $relationModel = $relationClass->getRelated();
                $foreignKey = $relationClass->getOwnerKey();
                $ownerKey = $relationClass->getForeignKey();
                $ownerTable = $model->getTable();
                $foreignTable = $relationModel->getTable();

                $ownerColumn = implode('.', [$ownerTable, $ownerKey]);
                $foreignColumn = implode('.', [$foreignTable, $foreignKey]);
                $sortedColumn = implode('.', [$foreignTable, $relations->last()]);

                $query->select([$ownerTable.'.*', $foreignTable.'.'.$relations->last()])
                    ->join($foreignTable, $foreignColumn, '=', $ownerColumn, 'left')
                    ->orderBy($foreignColumn, $direction);
            }
        }
    }

    /**
     * @param Builder $query
     * @param string $direction
     */
    protected function callDefaultClause(Builder $query, $direction)
    {
        if ($this->isRelationName($this->name)) {
            $this->loadRelationOrder($query, $direction);
        } else {
            $query->orderBy($this->name, $direction);
        }
    }
}
