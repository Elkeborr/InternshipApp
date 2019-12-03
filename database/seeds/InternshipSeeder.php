<?php

use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $internship = new \App\Internship();
        $internship->internship_function = 'Back End Developer';
        $internship->internship_discription = 'Je werkt oplossing gericht en wordt deel van een zeer gemotiveerd team.
        We werken klant gericht. Als stagiair moet je kennis hebben van php en laravel.';
        $internship->company_id = '2';
        $internship->available_spots = '2';
        $internship->save();

        $internship2 = new \App\Internship();
        $internship2->internship_function = 'Front-End developer';
        $internship2->internship_discription = 'Om onze verdere groei te ondersteunen, zoeken we een front-end developer stagiair. 
        Als stagiair ben je mee verantwoordelijk voor de algemene UX.';
        $internship2->company_id = '1';
        $internship2->available_spots = '1';
        $internship2->save();

        $internship3 = new \App\Internship();
        $internship3->internship_function = 'Front-End designer';
        $internship3->internship_discription = 'Als front-end designer werk je mee in een enthousiast team. Je wordt 
        als een van ons gezien en eigen mening geven is belangrijk';
        $internship3->company_id = '5';
        $internship3->available_spots = '2';
        $internship3->save();

        $internship4 = new \App\Internship();
        $internship4->internship_function = 'Graphic designer';
        $internship4->internship_discription = 'We zoeken iemand met voorliefde voor print.
        Onze stagiair zal zich mogen uitleven op verschillende verpakkingen';
        $internship4->company_id = '3';
        $internship4->available_spots = '1';
        $internship4->save();

        $internship5 = new \App\Internship();
        $internship5->internship_function = 'Graphic designer';
        $internship5->internship_discription = 'Wij zijn op zoek naar een enthousiaste stagiair assistent grafische vormgeving met kennis van onderstaande grafische programmas om ons grafische team te versterken in de periode tussen november - december 2019 t.e.m. januari 2020. Samen met het graphic team creëer jij mee de visuele content van Serax online en offline.';
        $internship5->company_id = '1';
        $internship5->available_spots = '1';
        $internship5->save();

        $internship6 = new \App\Internship();
        $internship6->internship_function = 'Java Developer';
        $internship6->internship_discription = 'Ontwerp en ontwikkel applicaties met behulp van Java / JEE-technologieën en -hulpmiddelen zoals Java, JavaScript en TypeScript, HTML, CSS, Tomcat en WebLogic, Spring, Hibernate, Postgresql en Oracle, JSON, XML, SOAP, Maven, ...';
        $internship6->company_id = '2';
        $internship6->available_spots = '1';
        $internship6->save();

        $internship7 = new \App\Internship();
        $internship7->internship_function = 'Fotograaf';
        $internship7->internship_discription = 'Opzoek naar een boeiende en gevarieerde stage. Een stage waar je 
        je creatief kunt uitleven en je eigen inbreng belangrijk is kijk dan zeker is hier.';
        $internship7->company_id = '4';
        $internship7->available_spots = '1';
        $internship7->save();

        // factory(\App\Internship::class, 50)->create();
    }
}
