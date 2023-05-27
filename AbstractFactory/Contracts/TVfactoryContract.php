<?php

namespace Contracts;

interface TVfactoryContract
{
    public function CreateLCD_TV(): LCD_TV_Contract;

    public function CreateLED_TV(): LED_TV_Contract;

}