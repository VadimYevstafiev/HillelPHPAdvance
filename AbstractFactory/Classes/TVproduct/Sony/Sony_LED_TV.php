<?php

namespace Classes\TVproduct\Sony;

use Contracts, Classes\TVproduct;

class Sony_LED_TV extends TVproduct\TVproduct implements Contracts\LED_TV_Contract
{
    protected string $fabricator = 'Sony';

    protected string $type = 'LED';
}