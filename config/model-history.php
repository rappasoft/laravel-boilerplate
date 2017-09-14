<?php

return [

    /*
     * Potential name attributes to be used for display purposes
     */
    'potential_name_attributes' => ['title', 'name', 'label', 'id'],

    /*
     * The user model namespace. Used to relate a history entry to the user who caused the entry
     */
    'user_model' => \App\Models\Auth\User::class,

];
