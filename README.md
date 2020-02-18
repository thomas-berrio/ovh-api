# simple-function-ovh-api

little function PHP for communicate ovh api

You can get your app key [here](https://eu.api.ovh.com/createApp/).

__Return exemple__ ovh_call($api[0],'GET','/domain/zone/'.'google.com');

Array
        (
            [code] => 200
            [json] => {"lastUpdate":"2019-03-30T10:00:58+01:00","hasDnsAnycast":false,"nameServers":["ns20.ovh.net","dns20.ovh.net"],"name":"google.com","dnssecSupported":true}
            [data] => Array
                (
                    [lastUpdate] => 2019-03-30T10:00:58+01:00
                    [hasDnsAnycast] => 
                    [nameServers] => Array
                        (
                            [0] => ns20.ovh.net
                            [1] => dns20.ovh.net
                        )

                    [name] => google.com
                    [dnssecSupported] => 1
                )

            [req] => https://eu.api.ovh.com/1.0/domain/zone/google.com
        )
