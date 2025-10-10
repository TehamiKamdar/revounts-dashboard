<?php
namespace App\Enums;
use App\Helper\Static\Vars;

enum AccountType: string
{
    case ADVERTISER = Vars::ADVERTISER_ROUTE;
    case PUBLISHER = Vars::PUBLISHER_ROUTE;
    case ADMIN = Vars::ADMIN_ROUTE;
}