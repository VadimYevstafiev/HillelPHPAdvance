<?php

namespace Classes\TVfactory;

use Contracts, Classes\TVproduct\LG;

class LG_TVfactory implements Contracts\TVfactoryContract
{

    public function CreateLCD_TV(): Contracts\LCD_TV_Contract
    {
        echo 'LG\LG_LCD_TV is created by LG_TVfactory' . PHP_EOL;
        return new LG\LG_LCD_TV();
    }

    public function CreateLED_TV(): Contracts\LED_TV_Contract
    {
        echo 'LG\LG_LED_TV is created by LG_TVfactory' . PHP_EOL;
        return new LG\LG_LED_TV();
    }

}