<?php
// Кол-во элементов

use function Termwind\style;

$limit = 4; 
 
// Подключение к БД
$dbh = new PDO('mysql:dbname=shops;host=localhost', 'root', '');
 
// Получение записей для текущей страницы
$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;				
$start = ($page != 1) ? $page * $limit - $limit : 0;
$sth = $dbh->prepare("SELECT * FROM `product_view` LIMIT {$start}, {$limit}");
$sth->execute();	
$items = $sth->fetchAll(PDO::FETCH_ASSOC);				
 
foreach ($items as $row) {
	?>
<!-- <div class="col-lg-3">
		<div class="prod-item-img">
			<img src="assets/<?php echo $row['img']; ?>" alt="" class="img-fluid">	
		</div>
		<div class="prod-item-name">
			<?php echo $row['product_name']; ?>		
		</div>
	</div> -->

    <div class="col-lg-3 col-xs-6 col-6">
                        <img src="assets/<?php echo $row['img']; ?>" alt="" class="img-fluid">
                        <div class="d-flex justify-content-between">
                            <div class="product-title"><?php echo $row['product_name']; ?>	</div>
                            <div class="product-price"><?php echo $row['price']; ?>	</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="product-category"><?php echo $row['category_name']; ?>	</div>
                            <div class="product-sale">34%</div>
                        </div>
                    </div>
	<?php
}

