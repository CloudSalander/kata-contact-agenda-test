<?php

namespace App\Tests;

use App\Tests\BaseTest;
use App\Domain\Agenda;
use App\Infrastructure\ContactExporter;

class ExportContactsTest extends BaseTest
{
    private string $tempFile;

    protected function setUp(): void
    {
        $this->tempFile = tempnam(sys_get_temp_dir(), 'contacts.txt');
    }

    protected function tearDown(): void
    {
        if (file_exists($this->tempFile)) {
            unlink($this->tempFile);
        }
    }

    public function testExportWithContactCreatesFile(): void
    {
        $agenda = $this->createAgenda();

        $contact = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@example.com",
            "600123123"
        );
        $agenda->add($contact);

        $exporter = new ContactExporter($this->tempFile);
        $exporter->export($agenda->getContacts());

        $this->assertFileExists($this->tempFile);
        $content = file_get_contents($this->tempFile);
        $this->assertStringContainsString('Pepe', $content);
        $this->assertStringContainsString('Lopez', $content);
    }

    public function testExportWithContactsCreatesFile(): void
    {
        $agenda = $this->createAgenda();

        $contact1 = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@example.com",
            "600123123"
        );


        $contact2 = $this->createContact(
            "Pepa",
            "Lopez",
            "pepa@example.com",
            "600125123"
        );
        $agenda->add($contact1);
        $agenda->add($contact2);

        $exporter = new ContactExporter($this->tempFile);
        $exporter->export($agenda->getContacts());

        $this->assertFileExists($this->tempFile);
        $content = file_get_contents($this->tempFile);
        $this->assertStringContainsString('Pepe', $content);
        $this->assertStringContainsString('Pepa', $content);
    }

    public function testExportWithEmptyAgendaDoesNotCreateFile(): void
    {
        
        $agenda = $this->createAgenda();
        $exporter = new ContactExporter($this->tempFile);
        $exporter->export($agenda->getContacts());

        $this->assertFileExists($this->tempFile); 
        $content = file_get_contents($this->tempFile);
        $this->assertEmpty(trim($content));
    }
}