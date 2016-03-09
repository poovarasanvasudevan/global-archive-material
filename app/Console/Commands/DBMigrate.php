<?php

namespace App\Console\Commands;

use App\ArtefactType;
use App\Location;
use App\User;
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
        $this->info("Creating roles and permission...");
        $admin = new Role();
        $admin->name = "Admin";
        $admin->slug="Administrator";
        $admin->description = "Admin Holds all The permission of this system";


        $user = new Role();
        $user->name = "User";
        $user->slug="User";
        $user->description = "User Holds limited permission of this system";

        if($admin->save() && $user->save()) {
            $this->info("Admin and User role created...");
        }

        $this->info("Assigning permission...");
        if($admin->assignPermission(Permission::all())) {
            $this->info("All permission Assigned to admin...");
        }



        //
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
        }

        $this->info($userCount . " Users Records migrated");

        $this->info("Fetching Artefact Type Table...");
        $artefact = DB::connection("mysql")->select("Select * from artefacttype");
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
