<?php

namespace App\Tests;

use App\Tests\BaseTest;

class SearchContactsTest extends BaseTest
{
    public function testSearchInEmptyAgendaReturnsEmpty(): void
    {
        $agenda = $this->createAgenda();

        $results = $agenda->searchBySurname('Lopez');

        $this->assertEmpty($results);
    }

    public function testSearchReturnsContactIfSurnameMatches(): void
    {
        $agenda = $this->createAgenda();
        $contact = $this->createContact(
            'Pepe',
            'Lopez',
            'john@example.com',
            '123456789'
        );
        $agenda->add($contact);

        $results = $agenda->searchBySurname('Lopez');

        $this->assertCount(1, $results);
        $this->assertSame($contact, array_values($results)[0]);
    }

    public function testSearchReturnsPartialMatches(): void
    {
        $agenda = $this->createAgenda();
        $contact1 = $this->createContact(
            'Pepe',
            'Lopez',
            'john@example.com',
            '123456789'
        );
        $contact2 = $this->createContact(
            'Pepa',
            'Lo',
            'john@example.com',
            '123456789'
        );
        $agenda->add($contact1);
        $agenda->add($contact2);

        $results = $agenda->searchBySurname('Lop');

        $this->assertCount(1, $results);
        $this->assertSame($contact1, array_values($results)[0]);
    }

    public function testSearchNonexistentSurnameReturnsEmpty(): void
    {
        $agenda = $this->createAgenda();
        $contact = $this->createContact(
            'Pepe',
            'Lopez',
            'john@example.com',
            '123456789'
        );
        $agenda->add($contact);

        $results = $agenda->searchBySurname('Ja');

        $this->assertEmpty($results);
    }

    public function testSearchReturnsAllContactsWithSameSurname(): void
    {
        $agenda = $this->createAgenda();
        $contact1 = $this->createContact(
            'Pepe',
            'Lopez',
            'john@example.com',
            '123456789'
        );
        $contact2 = $this->createContact(
            'Pepa',
            'Lopez',
            'john@example.com',
            '123456789'
        );
        $agenda->add($contact1);
        $agenda->add($contact2);

        $results = $agenda->searchBySurname('Lopez');

        $this->assertCount(2, $results);
        $this->assertSame($contact1, array_values($results)[0]);
        $this->assertSame($contact2, array_values($results)[1]);
    }
}
