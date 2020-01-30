<?php

namespace AjaxMultiUpload\Controller;

use Cake\Core\Configure;
use Cake\Core\Exception\Exception;

require_once(ROOT . DS . 'plugins' . DS . 'AjaxMultiUpload' . DS . 'vendor' . DS . 'valums.php');
use qqUploadedFileXhr;
use qqUploadedFileForm;
use qqFileUploader;
use MultiFileUploader;

/**
 *
 * Dual-licensed under the GNU GPL v3 and the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Suman (srs81 @ GitHub)
 * @package       plugin
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *                and/or GNU GPL v3 (http://www.gnu.org/copyleft/gpl.html)
 */
 
class UploadsController extends AjaxMultiUploadAppController {

	public $name = "Upload";
	public $uses = null;

	// list of valid extensions, ex. array("jpeg", "xml", "bmp")
	public $allowedExtensions = array('jpeg','png','jpg','gif');
    
    /**
    *	@function 	upload
    *	@access		public
    *	@date		5-Aug-2015
    *   @params     string
    * 	@return		void
    */    
    public function upload($dir=null) {
		// max file size in bytes
		$size = Configure::read ('AMU.filesizeMB');
		if (strlen($size) < 1) $size = 4;
		$relPath = Configure::read ('AMU.directory');
		if (strlen($relPath) < 1) $relPath = "Media";

		$sizeLimit = $size * 1024 * 1024;
                $this->layout = "ajax";
	        Configure::write('debug', 0);
		$directory = WWW_ROOT . $relPath;
 
		if ($dir === null) {
			$this->set("result", "{\"error\":\"Upload controller was passed a null value.\"}");
			return;
		}
		// Replace underscores delimiter with slash
		$dir = str_replace ("___", "/", $dir);
		$dir = $directory . DS . "$dir/";
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
             
		$uploader = new qqFileUploader($this->allowedExtensions, $sizeLimit);
       
		$result = $uploader->handleUpload($dir);
		$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
	}
    
    /**
    *	@function   uploadPostImages
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		int
    *	@date		5-Aug-2015
    * 	@return		boolean
    */
    public function uploadPostImages($postId = NULL) {
        $result = array();
        
		// max file size in bytes
		$size = Configure::read ('AMU.filesizeMB');
		if (strlen($size) < 1) $size = 4;
        
        //get from DB now
		$relPath = Configure::read ('AMU.directory');       
		if (strlen($relPath) < 1) $relPath = "files";

		$sizeLimit = $size * 1024 * 1024;
                $this->layout = "ajax";
	        Configure::write('debug', 0);
		$directory = WWW_ROOT . DS . $relPath;
       
        //get folder media
        $folderStr = $this->getRelPath('Client');
        //get user id
        $user = $this->Auth->user();
        if (isset($user['id'])) {
            $userId = $user['id'];
        } else {
            $userId = null;
        }
        
        //ex: dir = files/Client/user_id/post_id
		$dir = $directory . DS . $folderStr . DS . $userId . DS . $postId . DS;          
        
        //create root folder
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
        
        $uploader = new MultiFileUploader($this->allowedExtensions, $sizeLimit);
        //upload all files
        return $uploader->handleUploadMulti($dir);
	}

	/**
	 *
	 * delete a file
	 *
	 * Thanks to traedamatic @ github
	 */
	public function delete($file = null) {
		if(is_null($file)) {
			$this->Flash->success(__('File parameter is missing'));
			$this->redirect($this->referer());
		}
		$file = base64_decode($file);
		if(file_exists($file)) {
			if(unlink($file)) {
				$this->Flash->success(__('File deleted!'));				
			} else {
				$this->Flash->success(__('Unable to delete File'));					
			}
		} else {
			$this->Flash->success(__('File does not exist!'));					
		}
		
		$this->redirect($this->referer());	
	}
    
    /**
    *	@function 	getRelPath
    *	@access		private
    *   @params     string
    *	@date		5-Aug-2015
    * 	@return		string || NULL
    */
    private function getRelPath($name = NULL) {
        $folder = array();
        //get folder define in Medias
        $model = $this->loadModel('Medias');
        $model->displayField('folder');
        $medias = $model->find('list', ['limit' => '1'])->where("name = '{$name}'");
        //set folders
        foreach ($medias as $val) {
            return $val;
        }
        
        return NULL;
    }
}