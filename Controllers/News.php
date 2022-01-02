<?php
namespace Controllers;

class News extends Controller 
{
	private $model;
	private $itemsPerPage = 5;
	private $db;
	private $content;

	public function __construct() 
	{
		$this->model = new \Models\News();
	}

	protected function getViewPath() {
		return 'news/';
	}

	public function actionList($pageNumber) 
	{
		// если страница новостей
		$listStart = ($pageNumber * $this->itemsPerPage) - $this->itemsPerPage;
		$listItemsRow = $this->model->selectList($listStart, $this->itemsPerPage, 'news');
		$entriesAmount = $this->model->count('news');
		$itemsPerPage = $this->itemsPerPage;
		$this->pageTitle = 'Новости';

		echo $this->render('list',
		  	['listItemsRow' => $listItemsRow,
		  	'entriesAmount' => $entriesAmount,
		  	'itemsPerPage' => $itemsPerPage,
		  	'pageNumber' => $pageNumber]
		  );
	}

	public function actionView($id) 
	{
		// если страница detail
		$detailRow = $this->model->selectDetail($id, 'news');
		$title = $detailRow->title;
		$detailContent = $detailRow->content;
		$this->pageTitle = 'Статья';

		echo $this->render('detail',
			['title' => $title,
			'detailContent' => $detailContent]
		);  
	}
}
