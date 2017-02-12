<?php

return [
    /*
     * DataTables search options.
     */
    'search'         => [
        /*
         * Smart search will enclose search keyword with wildcard string "%keyword%".
         * SQL: column LIKE "%keyword%"
         */
        'smart'            => true,

        /*
         * Case insensitive will search the keyword in lower case format.
         * SQL: LOWER(column) LIKE LOWER(keyword)
         */
        'case_insensitive' => true,

        /*
         * Wild card will add "%" in between every characters of the keyword.
         * SQL: column LIKE "%k%e%y%w%o%r%d%"
         */
        'use_wildcards'    => false,
    ],

    /*
     * DataTables internal index id response column name.
     */
    'index_column'   => 'DT_Row_Index',

    /*
     * DataTables fractal configurations.
     */
    'fractal'        => [
        /*
         * Request key name to parse includes on fractal.
         */
        'includes'   => 'include',

        /*
         * Default fractal serializer.
         */
        'serializer' => League\Fractal\Serializer\DataArraySerializer::class,
    ],

    /*
     * Datatables list of available engines.
     * This is where you can register your custom datatables engine.
     */
    'engines'        => [
        'eloquent'   => Yajra\Datatables\Engines\EloquentEngine::class,
        'query'      => Yajra\Datatables\Engines\QueryBuilderEngine::class,
        'collection' => Yajra\Datatables\Engines\CollectionEngine::class,
    ],

    /*
     * Datatables accepted builder to engine mapping.
     */
    'builders'       => [
        Illuminate\Database\Eloquent\Relations\Relation::class => 'eloquent',
        Illuminate\Database\Eloquent\Builder::class            => 'eloquent',
        Illuminate\Database\Query\Builder::class               => 'query',
        Illuminate\Support\Collection::class                   => 'collection',
    ],

    /*
     * Nulls last sql pattern for Posgresql & Oracle.
     * For MySQL, use '-%s %s'
     */
    'nulls_last_sql' => '%s %s NULLS LAST',
];
