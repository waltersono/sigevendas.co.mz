<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OrganicUnitySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DelegationSeeder::class);
        $this->call(RepartitionSeeder::class);
        $this->call(AcademicLevelSeeder::class);
        $this->call(CareerSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TrainingSeeder::class);

        $this->call(ReportSeeder::class);


    }
}
