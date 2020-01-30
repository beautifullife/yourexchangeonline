<?php

/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory $uploadDirectory isn't writable. Please ask server admin to change permissions.");
        }
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty!');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large. Please ask server admin to increase the file upload limit.');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        $filename = md5(uniqid());
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
        }
        
        if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
            return array('success'=>true);
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    
}

class MultiFileUploader {
    
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $path;

    /*
    *	@function   __construct
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@date		5-Aug-2015
    * 	@return		void
    */
    public function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        //check setting
        $this->checkServerSettings();
    }
    
    /*
    *	@function   handleUpload
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@date		5-Aug-2015
    * 	@return		boolean || array
    */
    public function handleUploadMulti($uploadDirectory, $replaceOldFile = FALSE){
        $result = [
            'saveResult'    => null,
            'imageArr'      => [],
        ];
        //check directory
        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory $uploadDirectory isn't writable. Please ask server admin to change permissions.");
        }
        $this->path = $uploadDirectory;
        
        if (!isset($_FILES['multiFile']) || !isset($_FILES['multiFile']['name'])){
            return array('error' => 'No files were uploaded.');
        }
      
        //check & upload multi files
        foreach ($_FILES['multiFile']['name'] as $key=>$val) {
            if ($_FILES['multiFile']['size'][$key] <= 0 || $_FILES['multiFile']['size'][$key] > $this->sizeLimit) {
                continue;
            }
            //get info
            $pathinfo = pathinfo($val);
            $filename = $pathinfo['filename'];
            $filename = md5(uniqid());
            $ext = $pathinfo['extension'];
    
            if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
                $these = implode(', ', $this->allowedExtensions);
                return false;
            }
            
            if(!$replaceOldFile){
                /// don't overwrite previous files that were uploaded
                while (file_exists($this->path . $filename . '.' . $ext)) {
                    $filename .= rand(10, 99);
                }
            }
            //save file
            $result['saveResult'] = $this->save($_FILES['multiFile']['tmp_name'][$key],$this->path . $filename . '.' . $ext);
            //set values to return
            $result['imageArr'][] = $filename;
        }
        
        return $result;
    } 
    
    /*
    *	@function   save
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@date		5-Aug-2015
    * 	@return		boolean
    */
    private function save($src, $dest) {
        if(!move_uploaded_file($src, $dest)){
            return false;
        }
        return true;
    }
    
    /*
    *	@function   checkServerSettings
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@date		5-Aug-2015
    * 	@return		boolean
    */
    private function checkServerSettings(){
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            return array('error' => 'increase post_max_size and upload_max_filesize to $size');    
        }        
    }
    
    /*
    *	@function   toBytes
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public
    *   @params     string	
    *	@date		
    * 	@return		
    */
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
}