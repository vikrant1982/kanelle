<?php
namespace Commercepundit\MegaMenu\Block\Cache;

!defined('CACHE_LITE_ERROR_RETURN') ? define('CACHE_LITE_ERROR_RETURN', 1) : '';
!defined('CACHE_LITE_ERROR_DIE') ? define('CACHE_LITE_ERROR_DIE', 8) : '';

class Lite
{
    /**
     * @var string
     */

    var $_cacheDir = '/tmp/';

    /**
     * @var bool
     */

    var $_caching = true;

    /**
     * @var int
     */

    var $_lifeTime = 3600;

    /**
     * @var bool
     */

    var $_fileLocking = true;

    /**
     * @var
     */

    var $_refreshTime;

    /**
     * @var
     */

    var $_file;

    /**
     * @var
     */

    var $_fileName;

    /**
     * @var bool
     */

    var $_writeControl = true;

    /**
     * @var bool
     */

    var $_readControl = true;

    /**
     * @var string
     */

    var $_readControlType = 'crc32';

    /**
     * @var int
     */

    var $_pearErrorMode = CACHE_LITE_ERROR_RETURN;

    /**
     * @var
     */

    var $_id;

    /**
     * @var
     */

    var $_group;

    /**
     * @var bool
     */

    var $_memoryCaching = false;

    /**
     * @var bool
     */

    var $_onlyMemoryCaching = false;

    /**
     * @var array
     */

    var $_memoryCachingArray = array();

    /**
     * @var int
     */

    var $_memoryCachingCounter = 0;

    /**
     * @var int
     */

    var $_memoryCachingLimit = 1000;

    /**
     * @var bool
     */

    var $_fileNameProtection = true;

    /**
     * @var bool
     */

    var $_automaticSerialization = false;

    /**
     * @var int
     */

    var $_automaticCleaningFactor = 0;

    /**
     * @var int
     */

    var $_hashedDirectoryLevel = 0;

    /**
     * @var int
     */

    var $_hashedDirectoryUmask = 0700;

    /**
     * @var bool
     */

    var $_errorHandlingAPIBreak = false;

    /**
     * @var null
     */

	var $_hashedDirectoryGroup = NULL;

    /**
     * @var null
     */

	var $_cacheFileMode = NULL;

    /**
     * @var null
     */

	var $_cacheFileGroup = NULL;

    /**
     * Lite constructor.
     * @param array $options
     */
   
	public function __construct($options = array(NULL)){
		foreach($options as $key => $value) {
            $this->setOption($key, $value);
        }
		
		 ///  var_dump(function_exists('sys_get_temp_dir')); die('213123');
        if (!isset($options['cacheDir']) && function_exists('sys_get_temp_dir')) {
        	$this->setOption('cacheDir', sys_get_temp_dir() . DIRECTORY_SEPARATOR);
        }
	}

    /**
     * @param $name
     * @param $value
     */

    public function setOption($name, $value) 
    {
        $availableOptions = array('errorHandlingAPIBreak', 'hashedDirectoryUmask', 'hashedDirectoryLevel', 'automaticCleaningFactor', 'automaticSerialization', 'fileNameProtection', 'memoryCaching', 'onlyMemoryCaching', 'memoryCachingLimit', 'cacheDir', 'caching', 'lifeTime', 'fileLocking', 'writeControl', 'readControl', 'readControlType', 'pearErrorMode', 'hashedDirectoryGroup', 'cacheFileMode', 'cacheFileGroup');
        if (in_array($name, $availableOptions)) {
            $property = '_'.$name;
            $this->$property = $value;
        }
    }

    /**
     * @param $id
     * @param string $group
     * @param bool $doNotTestCacheValidity
     * @return bool|mixed|string|void
     */

    public function get($id, $group = 'default', $doNotTestCacheValidity = false)
    {
        $this->_id = $id;
        $this->_group = $group;
        $data = false;
        if ($this->_caching) {
            $this->_setRefreshTime();
            $this->_setFileName($id, $group);
            clearstatcache();
            if ($this->_memoryCaching) {
                if (isset($this->_memoryCachingArray[$this->_file])) {
                    if ($this->_automaticSerialization) {
                        return unserialize($this->_memoryCachingArray[$this->_file]);
                    }
                    return $this->_memoryCachingArray[$this->_file];
                }
                if ($this->_onlyMemoryCaching) {
                    return false;
                }                
            }
            if (($doNotTestCacheValidity) || (is_null($this->_refreshTime))) {
                if (file_exists($this->_file)) {
                    $data = $this->_read();
                }
            } else {
                if ((file_exists($this->_file)) && (@filemtime($this->_file) > $this->_refreshTime)) {
                    $data = $this->_read();
                }
            }
            if (($data) and ($this->_memoryCaching)) {
                $this->_memoryCacheAdd($data);
            }
            if (($this->_automaticSerialization) and (is_string($data))) {
                $data = unserialize($data);
            }
            return $data;
        }
        return false;
    }

    /**
     * @param $data
     * @param null $id
     * @param string $group
     * @return bool|string|void
     */

    public function save($data, $id = NULL, $group = 'default')
    {
        if ($this->_caching) {
            if ($this->_automaticSerialization) {
                $data = serialize($data);
            }
            if (isset($id)) {
                $this->_setFileName($id, $group);
            }
            if ($this->_memoryCaching) {
                $this->_memoryCacheAdd($data);
                if ($this->_onlyMemoryCaching) {
                    return true;
                }
            }
            if ($this->_automaticCleaningFactor>0 && ($this->_automaticCleaningFactor==1 || mt_rand(1, $this->_automaticCleaningFactor)==1)) {
				$this->clean(false, 'old');			
			}
            if ($this->_writeControl) {
                $res = $this->_writeAndControl($data);
                if (is_bool($res)) {
                    if ($res) {
                        return true;  
                    }
                    // if $res if false, we need to invalidate the cache
                    @touch($this->_file, time() - 2*abs($this->_lifeTime));
                    return false;
                }            
            } else {
                $res = $this->_write($data);
            }
            if (is_object($res)) {
                // $res is a PEAR_Error object 
                if (!($this->_errorHandlingAPIBreak)) {   
                    return false; // we return false (old API)
                }
            }
            return $res;
        }
        return false;
    }

    /**
     * @param $id
     * @param string $group
     * @param bool $checkbeforeunlink
     * @return bool|void
     */

    public function remove($id, $group = 'default', $checkbeforeunlink = false)
    {
        $this->_setFileName($id, $group);
        if ($this->_memoryCaching) {
            if (isset($this->_memoryCachingArray[$this->_file])) {
                unset($this->_memoryCachingArray[$this->_file]);
                $this->_memoryCachingCounter = $this->_memoryCachingCounter - 1;
            }
            if ($this->_onlyMemoryCaching) {
                return true;
            }
        }
        if ( $checkbeforeunlink ) {
            if (!file_exists($this->_file)) return true;
        }
        return $this->_unlink($this->_file);
    }

    /**
     * @param bool $group
     * @param string $mode
     * @return bool
     */

    public function clean($group = false, $mode = 'ingroup')
    {
        return $this->_cleanDir($this->_cacheDir, $group, $mode);
    }

    /**
     * set option variable
     */

    public function setToDebug()
    {
        $this->setOption('pearErrorMode', CACHE_LITE_ERROR_DIE);
    }

    /**
     * @param $newLifeTime
     */

    public function setLifeTime($newLifeTime)
    {
        $this->_lifeTime = $newLifeTime;
        $this->_setRefreshTime();
    }

    /**
     * @param $id
     * @param string $group
     */

    public function saveMemoryCachingState($id, $group = 'default')
    {
        if ($this->_caching) {
            $array = array(
                'counter' => $this->_memoryCachingCounter,
                'array' => $this->_memoryCachingArray
            );
            $data = serialize($array);
            $this->save($data, $id, $group);
        }
    }

    /**
     * @param $id
     * @param string $group
     * @param bool $doNotTestCacheValidity
     */

    public function getMemoryCachingState($id, $group = 'default', $doNotTestCacheValidity = false)
    {
        if ($this->_caching) {
            if ($data = $this->get($id, $group, $doNotTestCacheValidity)) {
                $array = unserialize($data);
                $this->_memoryCachingCounter = $array['counter'];
                $this->_memoryCachingArray = $array['array'];
            }
        }
    }

    /**
     * @return bool|int
     */

    public function lastModified() 
    {
        return @filemtime($this->_file);
    }

    /**
     * @param $msg
     * @param $code
     */

    public function raiseError($msg, $code)
    {
       var_dump($msg , $code); die('12312312');
	   // include_once('PEAR.php');
        //return PEAR::raiseError($msg, $code, $this->_pearErrorMode);
    }

    public function extendLife()
    {
        @touch($this->_file);
    }


    public function _setRefreshTime() 
    {
        if (is_null($this->_lifeTime)) {
            $this->_refreshTime = null;
        } else {
            $this->_refreshTime = time() - $this->_lifeTime;
        }
    }

    /**
     * @param $file
     * @return bool|void
     */

    public function _unlink($file)
    {
        if (!@unlink($file)) {
            return $this->raiseError('Lite : Unable to remove cache !', -3);
        }
        return true;        
    }

    /**
     * @param $dir
     * @param bool $group
     * @param string $mode
     * @return bool|void
     */

    public function _cleanDir($dir, $group = false, $mode = 'ingroup')     
    {
        if ($this->_fileNameProtection) {
            $motif = ($group) ? 'cache_'.md5($group).'_' : 'cache_';
        } else {
            $motif = ($group) ? 'cache_'.$group.'_' : 'cache_';
        }
        if ($this->_memoryCaching) {
	    foreach($this->_memoryCachingArray as $key => $v) {
                if (strpos($key, $motif) !== false) {
                    unset($this->_memoryCachingArray[$key]);
                    $this->_memoryCachingCounter = $this->_memoryCachingCounter - 1;
                }
            }
            if ($this->_onlyMemoryCaching) {
                return true;
            }
        }
        if (!($dh = opendir($dir))) {
            return $this->raiseError('Lite : Unable to open cache directory !', -4);
        }
        $result = true;
        while (($file = readdir($dh)) !== false) {
            if (($file != '.') && ($file != '..')) {
                if (substr($file, 0, 6)=='cache_') {
                    $file2 = $dir . $file;
                    if (is_file($file2)) {
                        switch (substr($mode, 0, 9)) {
                            case 'old':
                                // files older than lifeTime get deleted from cache
                                if (!is_null($this->_lifeTime)) {
                                    if ((time() - @filemtime($file2)) > $this->_lifeTime) {
                                        $result = ($result and ($this->_unlink($file2)));
                                    }
                                }
                                break;
                            case 'notingrou':
                                if (strpos($file2, $motif) === false) {
                                    $result = ($result and ($this->_unlink($file2)));
                                }
                                break;
                            case 'callback_':
                                $func = substr($mode, 9, strlen($mode) - 9);
                                if ($func($file2, $group)) {
                                    $result = ($result and ($this->_unlink($file2)));
                                }
                                break;
                            case 'ingroup':
                            default:
                                if (strpos($file2, $motif) !== false) {
                                    $result = ($result and ($this->_unlink($file2)));
                                }
                                break;
                        }
                    }
                    if ((is_dir($file2)) and ($this->_hashedDirectoryLevel>0)) {
                        $result = ($result and ($this->_cleanDir($file2 . '/', $group, $mode)));
                    }
                }
            }
        }
        return $result;
    }

    public function _touchCacheFile(){
        if (file_exists($this->_file)) {
            @touch($this->_file);
        }
    }

    /**
     * @param $data
     */

    public function _memoryCacheAdd($data)
    {
        $this->_touchCacheFile();
        $this->_memoryCachingArray[$this->_file] = $data;
        if ($this->_memoryCachingCounter >= $this->_memoryCachingLimit) {
            list($key, ) = each($this->_memoryCachingArray);
            unset($this->_memoryCachingArray[$key]);
        } else {
            $this->_memoryCachingCounter = $this->_memoryCachingCounter + 1;
        }
    }

    /**
     * @param $id
     * @param $group
     */

    public function _setFileName($id, $group)
    {
        
        if ($this->_fileNameProtection) {
            $suffix = 'cache_'.md5($group).'_'.md5($id);
        } else {
            $suffix = 'cache_'.$group.'_'.$id;
        }
        $root = $this->_cacheDir;
        if ($this->_hashedDirectoryLevel>0) {
            $hash = md5($suffix);
            for ($i=0 ; $i<$this->_hashedDirectoryLevel ; $i++) {
                $root = $root . 'cache_' . substr($hash, 0, $i + 1) . '/';
            }   
        }
        $this->_fileName = $suffix;
        $this->_file = $root.$suffix;
    }

    /**
     * @return bool|string|void
     */

    public function _read()
    {
        $fp = @fopen($this->_file, "rb");
        if ($fp) {
	    if ($this->_fileLocking) @flock($fp, LOCK_SH);
            clearstatcache();
            $length = @filesize($this->_file);
            $mqr = get_magic_quotes_runtime();
            if ($mqr) {
                set_magic_quotes_runtime(0);
            }
            if ($this->_readControl) {
                $hashControl = @fread($fp, 32);
                $length = $length - 32;
            }

            if ($length) {
                $data = '';
               
                while(!feof($fp)) $data .= fread($fp, 8192);
            } else {
                $data = '';
            }
            if ($mqr) {
                set_magic_quotes_runtime($mqr);
            }
            if ($this->_fileLocking) @flock($fp, LOCK_UN);
            @fclose($fp);
            if ($this->_readControl) {
                $hashData = $this->_hash($data, $this->_readControlType);
                if ($hashData != $hashControl) {
                    if (!(is_null($this->_lifeTime))) {
                        @touch($this->_file, time() - 2*abs($this->_lifeTime)); 
                    } else {
                        @unlink($this->_file);
                    }
                    return false;
                }
            }
            return $data;
        }
        return $this->raiseError('Lite : Unable to read cache !', -2); 
    }

    /**
     * @param $data
     * @return bool|void
     */

    public function _write($data)
    {
        if ($this->_hashedDirectoryLevel > 0) {
            $hash = md5($this->_fileName);
            $root = $this->_cacheDir;
            for ($i=0 ; $i<$this->_hashedDirectoryLevel ; $i++) {
                $root = $root . 'cache_' . substr($hash, 0, $i + 1) . '/';
                if (!(@is_dir($root))) {
					if (@mkdir($root))
					{
						@chmod($root, $this->_hashedDirectoryUmask);
						if (! is_null($this->_hashedDirectoryGroup))
							@chgrp($root, $this->_hashedDirectoryGroup);
					}
                }
            }
        }
		
		$is_newfile = (! is_null($this->_cacheFileMode) || !is_null($this->_cacheFileGroup)) 
			&& ! @file_exists($this->_file);
        $fp = @fopen($this->_file, "wb");
        if ($fp) {
            if ($this->_fileLocking) @flock($fp, LOCK_EX);
			if ($is_newfile)
			{
				if (! is_null($this->_cacheFileMode))
					@chmod($this->_file, $this->_cacheFileMode);
				if (! is_null($this->_cacheFileGroup))
					@chgrp($this->_file, $this->_cacheFileGroup);
			}
            if ($this->_readControl) {
                @fwrite($fp, $this->_hash($data, $this->_readControlType), 32);
            }
            $mqr = get_magic_quotes_runtime();
            if ($mqr) {
                set_magic_quotes_runtime(0);
            }
            @fwrite($fp, $data);
            if ($mqr) {
                set_magic_quotes_runtime($mqr);
            }
            if ($this->_fileLocking) @flock($fp, LOCK_UN);
            @fclose($fp);
            return true;
        }      
        return $this->raiseError('Lite : Unable to write cache file : '.$this->_file, -1);
    }

    /**
     * @param $data
     * @return bool|string|void
     */

    public function _writeAndControl($data)
    {
        $result = $this->_write($data);
        if (is_object($result)) {
            return $result; # We return the PEAR_Error object
        }
        $dataRead = $this->_read();
        if (is_object($dataRead)) {
            return $dataRead; # We return the PEAR_Error object
        }
        if ((is_bool($dataRead)) && (!$dataRead)) {
            return false; 
        }
        return ($dataRead==$data);
    }

    /**
     * @param $data
     * @param $controlType
     * @return string|void
     */

    public function _hash($data, $controlType)
    {
        switch ($controlType) {
        case 'md5':
            return md5($data);
        case 'crc32':
            return sprintf('% 32d', crc32($data));
        case 'strlen':
            return sprintf('% 32d', strlen($data));
        default:
            return $this->raiseError('Unknown controlType ! (available values are only \'md5\', \'crc32\', \'strlen\')', -5);
        }
    }
    
} 
