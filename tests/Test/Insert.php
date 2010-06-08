<?php
require_once dirname(dirname(__FILE__)) . '/init.php';
/**
 * @package Spot
 * @link http://spot.os.ly
 */
class Test_Insert extends PHPUnit_Framework_TestCase
{
	protected $backupGlobals = false;

	public function testInsertBlogPost()
	{
		$post = new Fixture_Post();
		$mapper = new Spot_Mapper(get_class($post));
		$post->title = "Test Post";
		$post->body = "<p>This is a really awesome super-duper post.</p><p>It's really quite lovely.</p>";
		$post->date_created = $mapper->adapter()->date();
		
		$result = $mapper->insert($post); // returns inserted id
		
		$this->assertTrue($result !== false);
	}
}