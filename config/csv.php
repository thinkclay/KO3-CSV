<?php defined('SYSPATH') OR die('No direct script access.');

return [
    'csv' => [
        'format' => [
            'delimiter'   => ',',
            'enclosure'   => '"',
            'linefeed'    => "\n",
            'has_titles'  => TRUE,
        ]
    ],
    'iif' => [
        'format' => [
            'delimiter'   => "\t",
            'enclosure'   => '',
            'linefeed'    => "\n",
            'has_titles'  => TRUE,
        ],
        'VEND' => [
            '!VEND',
            'NAME',
            'REFNUM',
            'TIMESTAMP',
            'PRINTAS',
            'ADDR1',
            'ADDR2',
            'ADDR3',
            'ADDR4',
            'ADDR5',
            'VTYPE',
            'CONT1',
            'CONT2',
            'PHONE1',
            'PHONE2',
            'FAXNUM',
            'EMAIL',
            'NOTE',
            'TAXID',
            'LIMIT',
            'TERMS',
            'NOTEPAD',
            'SALUTATION',
            'COMPANYNAME',
            'FIRSTNAME',
            'MIDINIT',
            'LASTNAME',
            'CUSTFLD1',
            'CUSTFLD2',
            'CUSTFLD3',
            'CUSTFLD4',
            'CUSTFLD5',
            'CUSTFLD6',
            'CUSTFLD7',
            'CUSTFLD8',
            'CUSTFLD9',
            'CUSTFLD10',
            'CUSTFLD11',
            'CUSTFLD12',
            'CUSTFLD13',
            'CUSTFLD14',
            'CUST+AC:APFLD15',
            '1099',
            'HIDDEN',
            'DELCOUNT',
        ],
        'TRNS' => [
            '!TRNS',
            'TRNSID',
            'TRNSTYPE',
            'DATE',
            'ACCNT',
            'NAME',
            'CLASS',
            'AMOUNT',
            'DOCNUM',
            'MEMO',
        ],
        'SPL' => [
            '!SPL',
            'SPLID',
            'TRNSTYPE',
            'DATE',
            'ACCNT',
            'NAME',
            'CLASS',
            'AMOUNT',
            'DOCNUM',
            'MEMO',
        ]
    ]
];