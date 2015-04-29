<?php 

class TechmidTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
		$this->Techmid = new Techmid;
	}
	
	public function testGetName() {
		$this->assertEquals($this->Techmid->getName(), 'Techmid - Soluções Digitais');
	}
}
