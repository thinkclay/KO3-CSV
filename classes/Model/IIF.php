<?php defined('SYSPATH') OR die('No Direct Script Access');

class Model_IIF extends Model
{
    public static function customer()
    {
        return [
            'titles' => [ 
                '!CUST',
                'NAME',
                'REFNUM',
                'TIMESTAMP',
                'BADDR1',
                'BADDR2',
                'BADDR3',
                'BADDR4',
                'BADDR5',
                'SADDR1',
                'SADDR2',
                'SADDR3',
                'SADDR4',
                'SADDR5',
                'PHONE1',
                'PHONE2',
                'FAXNUM',
                'EMAIL',
                'CONT1',
                'CONT2',
                'CTYPE',
                'TERMS',
                'TAXABLE',
                'LIMIT',
                'RESALENUM',
                'REP',
                'TAXITEM',
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
                'CUSTFLD15',
                'JOBDESC',
                'JOBTYPE',
                'JOBSTATUS',
                'JOBSTART',
                'JOBPROJEND',
                'JOBEND'
            ]
        ];
    }
}