<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Studio\Flow;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class EngagementTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->engagements->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "previous_page_url": null,
                    "next_page_url": null,
                    "url": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements?PageSize=50&Page=0",
                    "page": 0,
                    "first_page_url": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements?PageSize=50&Page=0",
                    "page_size": 50,
                    "key": "engagements"
                },
                "engagements": []
            }
            '
        ));

        $actual = $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                ->engagements->read();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->engagements("FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "flow_sid": "FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "contact_sid": "FCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "contact_channel_address": "+14155555555",
                "status": "ended",
                "context": {},
                "date_created": "2017-11-06T12:00:00Z",
                "date_updated": null,
                "url": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "steps": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Steps"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                ->engagements("FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->engagements->create("+15558675310", "+15017122661");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('To' => "+15558675310", 'From' => "+15017122661", );

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "url": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "flow_sid": "FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "context": {
                    "flow": {
                        "first_name": "Foo"
                    }
                },
                "contact_sid": "FCaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "contact_channel_address": "+18001234567",
                "status": "active",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "links": {
                    "steps": "https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Steps"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                ->engagements->create("+15558675310", "+15017122661");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->engagements("FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://preview.twilio.com/Studio/Flows/FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Engagements/FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->preview->studio->flows("FWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                ->engagements("FNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }
}