<?php

namespace Classes\TVproduct\LG;

use Contracts, Classes\TVproduct;

class LG_LED_TV extends TVproduct\TVproduct implements Contracts\LED_TV_Contract
{
    protected string $fabricator = 'LG';

    protected string $type = 'LED';
}