<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use \Maatwebsite\Excel\Sheet;
use App\Contracts\TokenAuthenticationProvider;  


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
        $tokenProvider = new TokenAuthenticationProvider;

        $this->app->singleton('provider', function() use ($tokenProvider) {
                return $tokenProvider;
            });

        \PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('CustomPdf', \App\Helpers\CustomDompdf::class);
        
        Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });

        Builder::macro('search', function( string $searchType, string $searchField, string $searchValue ) { 

            if( $searchValue === '' || $searchField === '' )
            {
                $query = $this;
            }
            else if ( str_contains($searchField, '.') )
            {
                [$relation, $relationField] = explode('.', $searchField);
                $query = $this->whereHas($relation, function( $subQuery ) use( $relationField, $searchValue, $searchType ) {
                    switch ($searchType) {
                        case 'startsWith':
                            $subQuery->where($relationField, 'like', "$searchValue%");
                            break;
                        case 'endsWith':
                            $subQuery->where($relationField, 'like', "%$searchValue");
                            break;
                        case 'contains':
                            $subQuery->where($relationField, 'like', "%$searchValue%");
                            break;
                        case 'exactMatch':
                            $subQuery->where($relationField, $searchValue);
                            break;
                        
                        default:

                            break;
                    }
                });
            }
            else
            {
                switch ($searchType) {
                    case 'startsWith':
                        $query = $this->where($searchField, 'like', "$searchValue%");
                        break;
                    case 'endsWith':
                        $query = $this->where($searchField, 'like', "%$searchValue");
                        break;
                    case 'contains':
                        $query = $this->where($searchField, 'like', "%$searchValue%");
                        break;
                    case 'exactMatch':
                        $query = $this->where($searchField, $searchValue);
                        break;
                    
                    default:
                        $query = $this;
                       
                }
            }

            return $query;
        });

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
