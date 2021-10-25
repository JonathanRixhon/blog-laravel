<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        $response = $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
    protected function client(): ApiClient
    {
        $mailchimp = new ApiClient();
        return $mailchimp->setConfig([
            'apiKey' => env('MAILCHIMP_KEY'),
            'server' => env('MAILCHIMP_SERVER_PREFIX')
        ]);
    }
}
