# Active Campaign PHP client

PHP Client for Active Campaign

Support API REST V3 and V1 (No REST)

## Composer 

> composer require felp/active-campaign-php

## Install

> composer install


## Usage

> Add Lead

```
<?php 

$data['contact']['email'] = 'test@test.com.br';
$data['contact']['org'] = 'test';
$data['contact']['2'] = 'test@test.com.br';

 $ac = new ActiveCampaign();
 $ac->setApiVersion(3);
 $ac->setApiKey('*');
 $ac->setApiUrl('*')
 $ac->insertLead($data);
 
```
 
 




