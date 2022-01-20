<?php

class ApiCatalogCest
{
    public function tryToGetCatalog(\ApiTester $I)
    {
        $product = [
            'id' => 1,
            'name' => 'Charmander',
            'image' => 'charmander.jpg'
        ];
        $I->sendGet('/catalog');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            $product
        ]);
    }

    public function tryToGetProduct(\ApiTester $I)
    {
        $product = [
            'id' => 1,
            'name' => 'Charmander',
            'image' => 'charmander.jpg'
        ];
        $I->sendGet('/catalog/' . $product['id']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($product);
    }
}
