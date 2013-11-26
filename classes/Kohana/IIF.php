<?php defined('SYSPATH') or die('No direct script access.');

/**
 * IIF - Kohana module for parsing and creating IIF files
 *
 * @package     CSV
 * @category    IIF
 * @author      Clay McIlrath
 * @see         https://github.com/thinkclay/php-lib-parse-csv
 */
class Kohana_IIF
{
    protected $_config;
    protected $_csv;
    protected $_filename;

    private $_data = [];
    private $_rows = [];
    private $_titles = [];

    /**
     * CSV Class constructor
     * 
     * @param   string  $filename   File name
     * @param   array   $config     CSV config
     * 
     * @return  CSV
     */
    public function __construct($filename, array $config = [])
    {
        require_once Kohana::find_file('vendor/parsecsv', 'parsecsv.lib');

        $this->_config = $config + (array) Kohana::$config->load('csv.iif');
        
        // Chop the first two lines and create a copy of the file as a CSV
        $file_data = file($filename);

        foreach ($file_data as $line)
        {
            if (preg_match('/^!/', $line))
            {
                $titles = explode("\t", trim($line));
                $this->_data[substr($titles[0], 1)]['titles'] = $titles;
            } 
        } 

        foreach ($this->_data as $k => $v)
        {
            foreach ($file_data as $line)
            {
                if (preg_match('/^'.$k.'/', $line))
                {
                    $this->_data[$k]['rows'][] = explode("\t", trim($line));
                } 
            } 
        } 

        $filename = preg_replace('/iif/i', 'csv', $filename);

        return $this;
    }

    /**
     * Create and return new CSV class
     *
     *   // Create new CSV class and use semi colon delimiter
     *   $csv = CSV::factory('file.csv', ['delimiter' => ';']);
     *
     * @param   string  $filename   Filename
     * @param   string  $format     File format to parse (csv, iif)
     * @param   array   $config     CSV config
     * 
     * @return  CSV
     */
    public static function factory($filename, array $config = [])
    {
        return new IIF($filename, $config);
    }


    public function data($type = NULL, array $rows = [])
    {
        if ($type AND count($rows))
        {
            foreach ($rows as $row)
            { 
                $set = [];

                foreach($this->_data[$type]['titles'] as $title)
                {
                    if (isset($row[$title]))
                    { 
                        $set[] = $row[$title];
                    }
                    else
                    {
                        $set[] = '';
                    } 
                } 
                $this->_data[$type]['rows'][] = $set;
            }

            return $this;
        }
        elseif ($type)
        {
            return $this->_data[$type];
        }
        else
        {
            return $this->_data;
        } 
    }

    public function create()
    {
        if (isset($this->_data['VEND']))
        {
            echo implode("\t", $this->_data['VEND']['titles'])."\r\n";

            foreach ($this->_data['VEND']['rows'] as $row)
            {
                echo implode("\t", $row)."\r\n";
            } 
        } 

        if (isset($this->_data['TRNS']))
        {
            echo implode("\t", $this->_data['TRNS']['titles'])."\r\n";
        } 

        if (isset($this->_data['SPL']))
        {
            echo implode("\t", $this->_data['SPL']['titles'])."\r\n";
        } 

        if (isset($this->_data['ENDTRNS']))
        {
            echo "!ENDTRNS\r\n";

            if (isset($this->_data['TRNS']))
            {
                foreach ($this->_data['TRNS']['rows'] as $row)
                {
                    echo implode("\t", $row)."\r\n";
                } 
            }

            if (isset($this->_data['SPL']))
            {
                foreach ($this->_data['SPL']['rows'] as $row)
                {
                    echo implode("\t", $row)."\r\n";
                } 
            }

             echo "ENDTRNS\r\n";
        } 
    }
}
