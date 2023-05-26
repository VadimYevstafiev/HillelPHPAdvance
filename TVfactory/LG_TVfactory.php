<?php

namespace TVfactory;

use TVproduct;

class LG_TVfactory implements TVfactoryContract
{

    public function CreateLCD_TV(): TVproduct\LCD_TV
    {
        return new TVproduct\LG_LCD_TV();
    }

    public function CreateLED_TV(): TVproduct\LED_TV
    {
        return new TVproduct\LG_LED_TV();
    }

}