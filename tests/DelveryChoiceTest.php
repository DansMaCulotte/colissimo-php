<?php

use Carbon\Carbon;
use DansMaCulotte\Colissimo\DeliveryChoice;
use DansMaCulotte\Colissimo\Resources\PickupPoint;
use PHPUnit\Framework\TestCase;

require_once 'Credentials.php';

class DeliveryChoiceTest extends TestCase
{
    public function testDeliveryChoice()
    {
        $delivery = new DeliveryChoice(
            [
                'accountNumber' => COLISSIMO_LOGIN,
                'password' => COLISSIMO_PASSWORD,
            ]
        );
        
        $result = $delivery->findPickupPoints(
            'Caen',
            '14000',
            'FR',
            Carbon::now()->format('d/m/Y'),
            [
                'address' => '7 rue Mélingue'
            ]
        );
        
        print_r($result);
    }

    public function testDeliveryChoiceByID()
    {
        $delivery = new DeliveryChoice(
            [
                'accountNumber' => COLISSIMO_LOGIN,
                'password' => COLISSIMO_PASSWORD,
            ]
        );

        $result = $delivery->findPickupPointByID(
            '149390',
            Carbon::now()->format('d/m/Y')
        );

        $this->assertInstanceOf(PickupPoint::class, $result);
    }
}
