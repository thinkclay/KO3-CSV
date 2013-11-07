# Hubspot Module for Kohana 3.x

A Kohana framework module to help reading and writing CSV files.

## Reading CSV file

Below is a typical example how to read csv file.

```php
// Read and parse CSV file
$csv = CSV::factory('file.csv')
    ->parse();

// Get titles
$titles = $csv->titles();

// Get rows data
$rows = $csv->rows();

// Loop each rows
foreach ($rows as $row)
{
    echo $row['name'];
}
```

You can also set custom delimiter, enclosure, etc in the config or directly in the code like example below

```php
$csv = CSV::factory('file.csv', [
    'delimiter'   => ';', // Use comma delimiter
    'has_titles'  => FALSE, // Assume csv does not has titles
]);
```

## Writing a CSV file

```php
// Save CSV file into file.csv
CSV::factory('file.csv')
    ->titles(['name', 'age'])
    ->values(['erick', '25'])
    ->values(['john', '32'])
    ->save();

// or save it using rows() instead of values
CSV::factory('file.csv')
    ->titles(['name', 'age'])
    ->rows([
        ['erick', '25'],
        ['john', 32'],
    ])
    ->save();
```

### Append CSV file

```php
CSV::factory('file.csv')
    ->values(array('donna', '25'))
    ->values(array('jade', '23'))
    ->save(TRUE);
```

## Misc

Set encoding

```php
CSV::factory('file.csv')
    ->encode('UTF-16', 'UTF-8');
```

### Make user download csv file

```php
CSV::factory('file.csv')
    ->titles(['name', 'age'])
    ->values(['erick', '25'])
    ->values(['john', '32'])
    ->send_file();
```

----
This module is released under an [MIT opensource license](http://opensource.org/licenses/MIT)