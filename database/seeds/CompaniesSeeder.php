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
        $company->bio = 'Antwerp Factory is the digital design & development duo for the connected world.
        We combine great design with your technological weapon of choice.
        This in order to create the ultimate brand experience digitally and in print.';
        $company->phoneNumber = '+32 (0)3 345 22 68';
        $company->email = 'info@antwerpfactory.com';
        $company->street = 'Pourbusstraat';
        $company->streetNumber = '25';
        $company->city = 'Antwerpen';
        $company->postalCode = '2000';
        $company->employees = '9';
        $company->state = 'Antwerpen';
        $company->user_id = 5;
        $company->save();

        $company2 = new \App\Company();

        $company2->name = 'Foreach';
        $company2->bio = 'We bedenken, ontwikkelen en integreren high-end web platformen, applicaties en tools. We ontwerpen sites, bouwen API’s, analyseren performantie bottlenecks, configureren databases, stellen architecturen op, integreren tools, ontwikkelen algoritmes, bouwen en onderhouden applicaties, etc. Als het technisch uitdagend is, heb je direct onze aandacht.';
        $company2->phoneNumber = '+32 (0)15 64 14 30';
        $company2->email = 'info@foreach.be';
        $company2->street = 'Frederik de Merodestraat ';
        $company2->streetNumber = '86a';
        $company2->city = 'Mechelen';
        $company2->postalCode = '2800';
        $company2->employees = '18';
        $company2->state = 'Antwerpen';
        $company2->user_id = 6;
        $company2->save();

        $company3 = new \App\Company();

        $company3->name = 'Duval Branding';
        $company3->bio = 'At Duval Branding, we dare companies to (re)discover who they really are. Why are they doing what they are doing? And, then, we help them to communicate their vision, beliefs and personality in a coherent, inspiring way. So they, somehow, become who they truly are.';
        $company3->phoneNumber = '+32 3 288 88 82';
        $company3->email = 'hello@duvalbranding.com';
        $company3->street = 'Regine Beerplein';
        $company3->streetNumber = '1';
        $company3->city = 'Antwerpen';
        $company3->postalCode = '2018';
        $company3->employees = '10';
        $company3->state = 'Antwerpen';
        $company3->user_id = 7;
        $company3->save();

        $company4 = new \App\Company();

        $company4->name = 'Marbles';
        $company4->bio = 'En wij zijn een Antwerps 360° communicatiebureau propvol goesting. Goesting om te evolueren. Om resultaten te boeken. Om projecten te creëren voor klanten die grote — en grootse — stappen willen ondernemen.';
        $company4->phoneNumber = '+32 3 620 26 79 ';
        $company4->email = 'hallo@marbles.be';
        $company4->street = 'Borsbeeksebrug';
        $company4->streetNumber = '1';
        $company4->city = 'Antwerpen';
        $company4->postalCode = '2600';
        $company4->employees = '16';
        $company4->state = 'Antwerpen';
        $company4->user_id = 8;
        $company4->save();

        $company5 = new \App\Company();

        $company5->name = 'Dive';
        $company5->phoneNumber = '';
        $company5->bio = 'We offer full services from design to deployment, but we can also assist your team with certain parts of the process.';
        $company5->email = 'info@dive.be';
        $company5->street = 'Zuidstationstraat';
        $company5->streetNumber = '40';
        $company5->city = 'Gent';
        $company5->postalCode = '9000';
        $company5->employees = '10';
        $company5->state = 'West-Vlaanderen';
        $company5->user_id = 9;
        $company5->save();
    }
}
