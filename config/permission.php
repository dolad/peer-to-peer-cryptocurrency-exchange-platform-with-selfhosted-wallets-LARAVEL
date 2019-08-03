<?php

return [

    'models' => [
        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => \App\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => \App\Models\Role::class,

    ],

    'table_names' => [
        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',
    ],

    /*
     * By default all permissions will be cached for 24 hours unless a permission or
     * role is updated. Then the cache will be flushed immediately.
     */

    'cache_expiration_time' => 60 * 24,

    /*
     * When set to true, the required permission/role names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    #--------------------------------------------------------------------------
    #  LIST OF USER PERMISSIONS (DO NOT EDIT)
    #--------------------------------------------------------------------------
    'list' => array(
        [
            'name' => 'view user details',
            'description' => 'Ability to view personal user details',
            'priority' => 5
        ],
        [
            'name' => 'edit user settings',
            'description' => 'Ability to edit user settings. This requires (view user details) permissions.',
            'requires' => ['view user details'],
            'priority' => 4,
        ],
        [
            'name' => 'edit user role',
            'description' => 'Ability to make changes to user roles',
            'requires' => ['view user details', 'edit user settings'],
            'priority' => 1,
        ],
        [
            'name' => 'resolve trade dispute',
            'description' => 'Ability to take absolute decision on a trade',
            'priority' => 3,
        ],
        [
            'name' => 'access admin panel',
            'description' => 'Ability to make changes to website settings',
            'priority' => 2,
        ],
        [
            'name' => 'manage earnings',
            'description' => 'Ability to manage escrow earnings and schedule payout',
            'requires' => ['access admin panel'],
            'priority' => 2,
        ],

    ),


    #--------------------------------------------------------------------------
    #  LIST OF USER ROLES (DO NOT EDIT)
    #--------------------------------------------------------------------------
    'roles' => array(
        [
            'name' => 'admin',
            'permissions' => [
                'access admin panel',
                'manage earnings',
                'resolve trade dispute',
                'view user details',
                'edit user role',
                'edit user settings',
            ]
        ],

        [
            'name' => 'moderator',
            'permissions' => [
                'resolve trade dispute',
                'view user details',
                'edit user settings',
            ]
        ],

        [
            'name' => 'user',
            'permissions' => []
        ]
    )
];