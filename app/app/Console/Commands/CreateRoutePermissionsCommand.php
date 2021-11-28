<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRoutePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-permission-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission routes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(  ) {
        parent::__construct(  );
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(  ) {
        $routes = \Illuminate\Support\Facades\Route::getRoutes(  )->getRoutes(  );
        $permissions = [  ];
        \Illuminate\Support\Facades\DB::transaction( function(  ) use ( $routes, $permissions ) {
            foreach( $routes as $route ) {
                if ( $route->getName(  ) && ! ( \App\Models\Permission::where( 'name', $route->getName(  ) )->exists(  ) ) ) {
                    array_push( $permissions, \App\Models\Permission::create( [
                        'name' => $route->getName(  ),
                    ] ) );
                }
            }
            $this->_assignPermission( $permissions );
        } );
        return Command::SUCCESS;
    }

    private function _assignPermission( $permissions ) {
        if ( ! ( is_null( $root_role = \App\Models\Role::where( 'name', 'root' )->first(  ) ) ) && count( $permissions ) > 0 ) {
            $root_role->syncPermissions( array_map( function( $permission ) {
                return $permission->id;
            }, $permissions ) );
        }
    }
}
