<?php

namespace App\Console\Commands;

use App\ArtefactType;
use App\Location;
use App\User;
use CsvReader;
use DB;
use Hash;
use Illuminate\Console\Command;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class DBMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate from existing db to new Postgres DB';


    private $connection = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->info("Create Roles");
        $permission = new Permission();
        $user = $permission->create([
            'name' => 'user',
            'slug' => [          // pass an array of permissions.
                'create' => true,
                'read' => true,
                'view' => true,
                'update' => true,
                'delete' => true
            ],
            'description' => 'manage user permissions'
        ]);

        $role = $permission->create([
            'name' => 'role',
            'slug' => [          // pass an array of permissions.
                'create' => true,
                'read' => true,
                'view' => true,
                'update' => true,
                'delete' => true
            ],
            'description' => 'manage role permissions'
        ]);

        $locationCount = 0;
        $userCount = 0;
        $artefacttypeCount = 0;


        $this->info("Fetching Location Table...");

        $location = DB::connection("mysql")->select("Select * from archivelocation");
        foreach ($location as $loc) {
            $location = new Location();
            $location->code = $loc->Code;
            $location->description = $loc->Description;
            if ($location->save()) {
                $locationCount++;
            }
        }

        $this->info($locationCount . " Location Records migrated");


        //=======================================================================

        $this->info("Fetching Users Table...");
        $users = DB::connection("mysql")->select("Select * from user");
        foreach ($users as $u) {
            $us = new User();
            $us->location = $u->LocationFk;
            $us->firstname = $u->FirstName;
            $us->middlename = $u->MiddleName;
            $us->lastname = $u->LastName;
            $us->abhyasiid = $u->AbhyasiID;
            $us->email = $u->EmailId;
            $us->password = md5($u->Password);

            if ($us->save()) {
                $userCount++;
            }

            $us->assignPermission($user);
            $us->assignPermission($role);
        }

        $this->info($userCount . " Users Records migrated");


        $this->info("Making Admin.....");


        $auser = User::find(3);

        $this->info("Assigning permission...");

        $auser->addPermission('user');
        $auser->addPermission('role');


        $this->info("Fetching Artefact Type Table...");
        $artefact = DB::connection("mysql")->select("Select * from artefacttype WHERE ArtefactTypePID id NULL ");
        foreach ($artefact as $u) {
            $us = new ArtefactType();
            $us->artefacttypecode = $u->ArtefactTypeCode;
            $us->artefacttypepid = 0;
            $us->artefacttypedescription = $u->ArtefactTypeDescription;
            $us->artefacticon = "";
            $us->sequencenumber = $u->SequenceNumber;


            if ($us->save()) {
                $artefacttypeCount++;
            }
        }

        $this->info($artefacttypeCount . " artefact type Records migrated");

    }
}
