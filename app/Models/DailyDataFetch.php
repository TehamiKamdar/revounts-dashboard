<?php

namespace App\Models;

class DailyDataFetch extends BaseModelWithoutUuids
{
    protected $table = "daily_data_fetches";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "publisher_id",
        "website_id",
        "advertiser_id",
        "path",
        "date",
        "payload",
        "status",
        "is_processing",
        "queue",
        "landing_url",
        "error_code",
        "error_message"
    ];
}
