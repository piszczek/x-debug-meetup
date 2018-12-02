<?php

use App\Tests\ApiTester;

class BookCest
{
    /**
     */
    public function createBookSuccess(ApiTester $I)
    {
        $I->sendAjaxPostRequest(
            "/book/new",
            [
                'title' => 'testName',
            ]
        );

        $I->seeResponseContains("Book index");
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }

    /**
     *
     */
    public function updateBookFail(ApiTester $I)
    {
        $I->sendAjaxPostRequest(
            "/book/1/edit",
            [
                'title' => ''
            ]
        );

        $response = $I->grabResponse();

        $I->seeResponseContains("This value should not be blank");
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }

}
