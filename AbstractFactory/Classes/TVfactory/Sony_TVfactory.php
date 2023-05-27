<?php

namespace Classes\TVfactory;

use Contracts, Classes\TVproduct\Sony;

class Sony_TVfactory implements Contracts\TVfactoryContract
{
    
    public function CreateLCD_TV(): Contracts\LCD_TV_Contract
    {
        echo 'Sony\Sony_LCD_TV is created by Sony_TVfactory' . PHP_EOL;
        return new Sony\Sony_LCD_TV();
    }

    public function CreateLED_TV(): Contracts\LED_TV_Contract
    {
        echo 'Sony\Sony_LED_TV is created by Sony_TVfactory' . PHP_EOL;
        return new Sony\Sony_LED_TV();
    }

}