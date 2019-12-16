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
        $internship->internship_profile = 'Je hebt kennis van php en laravel. Je zit in je laatste bachelor jaar';
        $internship->education_level = 'Hoger Onderwijs';
        $internship->languages = 'Nederlands en Engels';
        $internship->drivers_license = false;
        $internship->available_spots = '2';
        $internship->remarks = "We lezen graag motivatie briefen en cv's goed door dus geef ons de tijd deze te verwerken";
        $internship->paid = false;
        $internship->status = true;
        $internship->company_id = '2';
        $internship->save();

        $internship2 = new \App\Internship();
        $internship2->internship_function = 'Front-End developer';
        $internship2->internship_discription = 'Om onze verdere groei te ondersteunen, zoeken we een front-end developer stagiair. 
        Als stagiair ben je mee verantwoordelijk voor de algemene UX.';
        $internship2->internship_profile = 'Je kan zelfstandig aan de slag met een opdracht en aarzelt niet om informatie op te zoeken of wanneer nodig hulp te vragen aan collega’s. je hebt een goede basis van css en html. ';
        $internship2->education_level = 'Hoger Onderwijs';
        $internship2->languages = 'Nederlands, Frans en Engels';
        $internship2->drivers_license = false;
        $internship2->available_spots = '1';
        $internship2->remarks = 'Geen opmerkingen';
        $internship2->paid = false;
        $internship2->status = true;
        $internship2->company_id = '1';
        $internship2->save();

        $internship3 = new \App\Internship();
        $internship3->internship_function = 'Front-End designer';
        $internship3->internship_discription = 'Als front-end designer werk je mee in een enthousiast team. Je wordt 
        als een van ons gezien en eigen mening geven is belangrijk';
        $internship3->internship_profile = 'Je volgt een Bachelor of Master opleiding in computerwetenschappen of IT en zoekt een onbezoldigde schoolstage van minstens 12 weken.Je denkt analytisch en oplossingsgericht';
        $internship3->education_level = 'Hoger Onderwijs';
        $internship3->languages = 'Nederlands';
        $internship3->drivers_license = false;
        $internship3->available_spots = '2';
        $internship3->remarks = 'Portfolio is verplicht';
        $internship3->paid = false;
        $internship3->status = true;
        $internship3->company_id = '5';
        $internship3->save();

        $internship4 = new \App\Internship();
        $internship4->internship_function = 'Graphic designer';
        $internship4->internship_discription = 'We zoeken iemand met voorliefde voor print.
        Onze stagiair zal zich mogen uitleven op verschillende verpakkingen';
        $internship4->internship_profile = "je kent verpakkings programma's en kan werken met illustrator, indesign en photoshop.";
        $internship4->education_level = 'Hoger Onderwijs';
        $internship4->languages = 'Nederlands en Frans';
        $internship4->drivers_license = false;
        $internship4->available_spots = '1';
        $internship4->remarks = 'Wil je meer informatie, stel al je vragen via hello@duvalbranding.com';
        $internship4->paid = false;
        $internship4->status = true;
        $internship4->company_id = '3';

        $internship4->save();

        $internship5 = new \App\Internship();
        $internship5->internship_function = 'Graphic designer';
        $internship5->internship_discription = 'Wij zijn op zoek naar een enthousiaste stagiair assistent grafische vormgeving met kennis van onderstaande grafische programmas om ons grafische team te versterken in de periode tussen november - december 2019 t.e.m. januari 2020. Samen met het graphic team creëer jij mee de visuele content van Serax online en offline.';
        $internship5->internship_profile = 'Je ontwerpt visuals voor social media, print en digital. Goede kennis van photoshop, Indesign & Illustrator ';
        $internship5->education_level = 'Hoger Onderwijs';
        $internship5->languages = 'Nederlands, Frans en Engels';
        $internship5->drivers_license = false;
        $internship5->available_spots = '2';
        $internship5->remarks = 'Geen opmerkingen';
        $internship5->paid = true;
        $internship5->status = true;
        $internship5->company_id = '1';
        $internship5->save();

        $internship6 = new \App\Internship();
        $internship6->internship_function = 'Java Developer';
        $internship6->internship_discription = 'Ontwerp en ontwikkel applicaties met behulp van Java / JEE-technologieën en -hulpmiddelen zoals Java, JavaScript en TypeScript, HTML, CSS, Tomcat en WebLogic, Spring, Hibernate, Postgresql en Oracle, JSON, XML, SOAP, Maven, ...';
        $internship6->internship_profile = 'je zit in je laatste jaar van je bachelor opleiding en wilt de echt wereld verkennen. Een goede basis van java is verplicht, de kneepjes leren we je hier';
        $internship6->education_level = 'Hoger Onderwijs';
        $internship6->languages = 'Nederlands';
        $internship6->drivers_license = false;
        $internship6->available_spots = '1';
        $internship6->remarks = 'Geen opmerkingen';
        $internship6->paid = true;
        $internship6->status = true;
        $internship6->company_id = '2';
        $internship6->save();

        $internship7 = new \App\Internship();
        $internship7->internship_function = 'Fotograaf';
        $internship7->internship_discription = "Opzoek naar een boeiende en gevarieerde stage. Een stage waar je 
        je creatief kunt uitleven en je eigen inbreng belangrijk is kijk dan zeker is hier. We gebruiken de foto's voor instagram, facebook en website. ";
        $internship7->internship_profile = 'We zoeken iemand die enthousiast achter de camera staat en niet bang is van experimenteren.
        Je moet kennis hebben van photoshop.';
        $internship7->education_level = 'Hoger Onderwijs';
        $internship7->languages = 'Nederlands, Frans en Engels';
        $internship7->drivers_license = true;
        $internship7->available_spots = '1';
        $internship7->remarks = 'Als onze fotografe zal je geregeld op verplaatsing werken, u kilometers worden vergoed.';
        $internship7->paid = true;
        $internship7->status = true;
        $internship7->company_id = '4';
        $internship7->save();

        $internship8 = new \App\Internship();
        $internship8->internship_function = 'ASP.NET developer';
        $internship8->internship_discription = 'Op zoek naar een gedreven asp.netter die de kneepjes van het vak wil leren bij ons in het bedrijf. ';
        $internship8->internship_profile = 'We zoeken een enthousiaste persoon die oplossingsgericht werkt.';
        $internship8->education_level = 'Hoger Onderwijs';
        $internship8->languages = 'Nederlands en Engels';
        $internship8->drivers_license = false;
        $internship8->available_spots = '1';
        $internship8->remarks = 'Onze koffie is de beste';
        $internship8->paid = false;
        $internship8->status = true;
        $internship8->company_id = '6';
        $internship8->save();

        // factory(\App\Internship::class, 50)->create();
    }
}
