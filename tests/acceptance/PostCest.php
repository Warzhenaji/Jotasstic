<?php 

class PostCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToEditPost(AcceptanceTester $I)
    {
    	$I->amOnPage('/login');
    	$I->fillField('email', 'nwninja1@gmail.com');
		$I->fillField('password', 'password');
		$I->click('#loginBtn');
		$I->seeInCurrentUrl('/dashboard');
    }
}
