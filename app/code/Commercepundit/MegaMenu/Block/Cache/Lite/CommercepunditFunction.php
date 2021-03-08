<?php

namespace Commercepundit\MegaMenu\Block\Cache\Lite;

use Commercepundit\MegaMenu\Block\Cache\Lite;

class CommercepunditFunction extends Lite
{
    /**
     * @var string
     */

     var $_defaultGroup = 'CommercepunditFunction';

    /**
     * @var bool
     */

     var $_dontCacheWhenTheOutputContainsNOCACHE = false;

    /**
     * @var bool
     */

     var $_dontCacheWhenTheResultIsFalse = false;

    /**
     * @var bool
     */

     var $_dontCacheWhenTheResultIsNull = false;

    /**
     * @var bool
     */

     var $_debugCacheLiteFunction = false;

    /**
    * Constructor
    *
    * $options is an assoc. To have a look at availables options,
    * see the constructor of the Lite class in 'Lite.php'
    *
    * Comparing to Lite constructor, there is another option :
    * $options = array(
    *     (...) see Lite constructor
    *     'debugCacheLiteFunction' => (bool) debug the caching process,
    *     'defaultGroup' => default cache group for function caching (string),
    *     'dontCacheWhenTheOutputContainsNOCACHE' => (bool) don't cache when the function output contains "NOCACHE",
    *     'dontCacheWhenTheResultIsFalse' => (bool) don't cache when the function result is false,
    *     'dontCacheWhenTheResultIsNull' => (bool don't cache when the function result is null
    * );
    *
    * @param array $options options
    * @access public
    */
	public function __construct($options = array(NULL)){
		$availableOptions = array('debugCacheLiteFunction', 'defaultGroup', 'dontCacheWhenTheOutputContainsNOCACHE', 'dontCacheWhenTheResultIsFalse', 'dontCacheWhenTheResultIsNull');
        while (list($name, $value) = each($options)) {
            if (in_array($name, $availableOptions)) {
                $property = '_'.$name;
                $this->$property = $value;
            }
        }
        reset($options);
        parent::__construct($options);
	}
    
    /**
    * Calls a cacheable function or method (or not if there is already a cache for it)
    *
    * Arguments of this method are read with func_get_args. So it doesn't appear
    * in the function definition. Synopsis :
    * call('functionName', $arg1, $arg2, ...)
    * (arg1, arg2... are arguments of 'functionName')
    *
    * @return mixed result of the function/method
    * @access public
    */
    public function call()
    {
        $arguments = func_get_args();
        $id = $this->_makeId($arguments);
        $data = $this->get($id, $this->_defaultGroup);
        if ($data !== false) {
            if ($this->_debugCacheLiteFunction) {
                echo "Cache hit !\n";
            }
            $array = unserialize($data);
            $output = $array['output'];
            $result = $array['result'];
        } else {
            if ($this->_debugCacheLiteFunction) {
                echo "Cache missed !\n";
            }
            ob_start();
            ob_implicit_flush(false);
            $target = array_shift($arguments);
            if (is_array($target)) {
                // in this case, $target is for example array($obj, 'method')
                $object = $target[0];
                $method = $target[1];
                $result = call_user_func_array(array(&$object, $method), $arguments);
            } else {
                if (strstr($target, '::')) { // classname::staticMethod
                    list($class, $method) = explode('::', $target);
                    $result = call_user_func_array(array($class, $method), $arguments);
                } else if (strstr($target, '->')) { // object->method
                    // use a stupid name ($objet_123456789 because) of problems where the object
                    // name is the same as this var name
                    list($object_123456789, $method) = explode('->', $target);
                    global $$object_123456789;
                    $result = call_user_func_array(array($$object_123456789, $method), $arguments);
                } else { // function
                    $result = call_user_func_array($target, $arguments);
                }
            }
            $output = ob_get_contents();
            ob_end_clean();
            if ($this->_dontCacheWhenTheResultIsFalse) {
                if ((is_bool($result)) && (!($result))) {
                    echo($output);
                    return $result;
                }
            }
            if ($this->_dontCacheWhenTheResultIsNull) {
                if (is_null($result)) {
                    echo($output);
                    return $result;
                }
            }
            if ($this->_dontCacheWhenTheOutputContainsNOCACHE) {
                if (strpos($output, 'NOCACHE') > -1) {
                    return $result;
                }
            }
            $array['output'] = $output;
            $array['result'] = $result;
            $this->save(serialize($array), $id, $this->_defaultGroup);
        }
        echo($output);
        return $result;
    }

    /**
    * Drop a cache file
    *
    * Arguments of this method are read with func_get_args. So it doesn't appear
    * in the function definition. Synopsis :
    * remove('functionName', $arg1, $arg2, ...)
    * (arg1, arg2... are arguments of 'functionName')
    *
    * @return boolean true if no problem
    * @access public
    */
    public function drop()
    {
        $id = $this->_makeId(func_get_args());
        return $this->remove($id, $this->_defaultGroup);
    }

    /**
    * Make an id for the cache
    *
    * @var array result of func_get_args for the call() or the remove() method
    * @return string id
    * @access private
    */
    public function _makeId($arguments)
    {
        $id = serialize($arguments); // Generate a cache id
        if (!$this->_fileNameProtection) {
            $id = md5($id);
            // if fileNameProtection is set to false, then the id has to be hashed
            // because it's a very bad file name in most cases
        }
        return $id;
    }

}
