<?php

namespace Src\Models;

/*
 * Class Post
 *
 * @package Src
*/
class Post{

	public function getUrl(){
		return 'index.php?page=blog/article&id=' . $this->id_post;
	}

	public function getExtract(){
		if (empty($this->introduction)){
            $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        }else{
            $html = '<p>' . substr($this->introduction, 0, 150) . '...</p>';
        }
		$html .= '<a href="' . $this->getUrl() . '">Lire la suite</a>';
		return $html;
	}

}