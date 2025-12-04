<?php

class ListContactsTest extends BaseTest {

    public function testlistEmptyContacts() {
        $this->agenda = new Agenda();
        $this->assertEquals("",$agenda->showContacts);
    }
}