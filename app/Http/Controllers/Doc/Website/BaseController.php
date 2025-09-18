<?php

namespace App\Http\Controllers\Doc\Website;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function websiteFields()
    {
        return [
            "wid",
            "name",
            "categories",
            "partner_types",
            "url",
            "status",
            "country",
            "monthly_traffic",
            "monthly_page_views",
            "property_type_website",
            "property_type_app",
            "logo",
            "app_logo",
        ];
    }
}
