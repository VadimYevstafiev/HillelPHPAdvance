<?php

namespace TVfactory;

use TVproduct;

class Sony_TVfactory implements TVfactoryContract
{
    public function CreateLCD_TV(): TVproduct\LCD_TV
    {
        return new TVproduct\Sony_LCD_TV();
    }

    public function CreateLED_TV(): TVproduct\LED_TV
    {
        return new TVproduct\Sony_LED_TV();
    }

}