<?php
App::uses('Watchlist', 'Model');

/**
 * Watchlist Test Case
 *
 */
class WatchlistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.watchlist',
		'app.company',
		'app.employee',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Watchlist = ClassRegistry::init('Watchlist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Watchlist);

		parent::tearDown();
	}

}
