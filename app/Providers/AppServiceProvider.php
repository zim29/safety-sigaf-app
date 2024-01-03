<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('sortBy', function( string | null $field, string $sortDirection ) { 

            if( $field === null )
            {
                $query = $this;
            }
            elseif( str_contains( $field, '.' ) )
            {
                [$relation, $relationField] = explode('.', $field);
                $class = getClass($this->model, $relation);
                $relationInstance = $this->model->first()->$relation();
                $foreignKey = $relationInstance->getForeignKeyName();
                $relatedKey = $relationInstance->getOwnerKeyName();
                $table = $relationInstance->getRelated()->getTable();

                $query =  $this->orderBy($class::select($relationField)
                                                    ->whereColumn($foreignKey, $relatedKey)
                                                    ->orderBy($relationField, $sortDirection)
                                                    ->limit(1), 
                                                    $sortDirection
                                                );

            }
            else $query = $this->orderBy($field, $sortDirection);

            return $query;
        });

        function getClass ( Model $className, string $relation ) : string
        {
            $instance = $className::with( $relation )->first();
            $relationInstance = $instance->getRelation( $relation );
            $relationClassName = get_class( $relationInstance );

            return $relationClassName;
        }
    }
}
