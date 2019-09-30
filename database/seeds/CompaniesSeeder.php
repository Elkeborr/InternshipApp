<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $company = new \App\Company();
        $company->name = 'Antwerp Factory';
        $company->phoneNumber = '+32 (0)3 345 22 68';
        $company->email = 'info@antwerpfactory.com';
        $company->employees = '9';
        $company->street = 'Pourbusstraat';
        $company->streetNumber = '25';
        $company->city = 'Antwerp';
        $company->postalCode = '2000';
        $company->save();

        $company2 = new \App\Company();
        $company2->name = 'foreach';
        $company2->phoneNumber = '+32 (0)15 64 14 30';
        $company2->email = 'info@foreach.be';
        $company2->employees = '18';
        $company2->street = 'Frederik de Merodestraat ';
        $company2->streetNumber = '86a';
        $company2->city = 'Mechelen';
        $company2->postalCode = '2800';
        $company2->save();

        $company3 = new \App\Company();
        $company3->name = 'duval branding';
        $company3->phoneNumber = '+32 3 288 88 82';
        $company3->email = 'hello@duvalbranding.com';
        $company3->employees = '10';
        $company3->street = 'Regine Beerplein';
        $company3->streetNumber = '1';
        $company3->city = 'Antwerpen';
        $company3->postalCode = '2018';
        $company3->save();

        $company4 = new \App\Company();
        $company4->name = 'haribo';
        $company4->phoneNumber = '';
        $company4->email = 'info@haribo.com';
        $company4->employees = '18';
        $company4->street = 'Duffelsesteenweg';
        $company4->streetNumber = '233';
        $company4->city = 'Kontich';
        $company4->postalCode = '2550';
        $company4->save();

        $company5 = new \App\Company();
        $company5->name = 'Dive';
        $company5->phoneNumber = '';
        $company5->email = 'info@dive.be';
        $company5->employees = '10';
        $company5->street = 'Zuidstationstraat';
        $company5->streetNumber = '40';
        $company5->city = 'Gent';
        $company5->postalCode = '9000';
        $company5->save();
    }
}
