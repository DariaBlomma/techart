<!-- страница списка новостей -->
<div class='news-list'>
	<header class='header'>
		<h1 class='primary-title'>Новости</h1>
	</header>
	<main class='main stretched'>
			<?php foreach ($listItemsRow as $k => $v){ ?>
				<article class='article'>
					<span class='date'> <?= date('d.m.Y', $v['idate'])?> </span>
					<a class='title' href='/news/<?= $v['id']?>/'> <?= $v['title'] ?> </a>
					<p class='announce'> <?= $v['announce'] ?></p>
				</article>
		<?php } ?>
	</main>
	<footer class='footer'>
		<h3 class='title-3'>Страницы :</h3>
		<div class='pages-btns'>
		<?php  
			// кол-во строк в таблице
			while ($btnsRow = $entriesAmount->fetch()) {
				$btnsTotal = $btnsRow[0];
				// кол-во страниц
				$pagesAmount = ceil($btnsTotal / $itemsPerPage);
				for ($i = 1; $i <= $pagesAmount; $i++) { ?>
					<a href='/news/page-<?= $i ?>/' class="btn <?= $pageNumber == $i ? 'current' : ''?>"><?= $i ?></a>
		<?php } 
			}       
		?>
		</div>
	</footer>
</div>
