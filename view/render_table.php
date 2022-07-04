<?php
	require '../conf/config.php';

	$field = 'ID';
	$sort = 'ASC';

	if (isset($_GET['sorting'])) {
		if($_GET['sorting'] == 'ASC') {
			$sort = 'DESC';
		} else { 
			$sort = 'ASC'; 
		}
	}

	if($_GET['sorting']) {
		if($_GET['field'] == 'id') { 
			$field = "ID"; 
		} elseif ($_GET['field'] == 'f_name') {
			$field = "f_name";
		} elseif($_GET['field'] == 'email') {
			$field="email";
		} elseif ($_GET['field'] == 'f_description') {
			$field="f_description";
		} elseif ($_GET['field'] == 'state') {
			$field="state";
		} elseif ($_GET['field'] == 'category') {
			$field = "category";
		}
	}

	$url = 'render_table.php';
	$limit = 3;
	$page = $_GET['p'];

	if ($page == '') {
		$page = 1;
		$start = 0;
	} else {
		$start = $limit*($page-1);
	}

	$sql = "SELECT id, f_name, email, f_description, state, category FROM list ORDER BY $field $sort limit $start, $limit";
	$total_values = mysqli_query($conn, "SELECT id, f_name, email, f_description, state, category FROM list");
	$total = mysqli_num_rows($total_values);
	$maxpage = ceil($total/$limit);
	$result = mysqli_query($conn, $sql) or die(mysqli_connect_error());

	echo'<table class="table table-striped table-warning">';
	echo'<th scope="col">id</th>
		<th scope="col"><a class="link-dark text-decoration-none" href="admin.php?sorting='.$sort.'&field=f_name">Имя</a></th>
		<th scope="col"><a class="link-dark text-decoration-none" href="admin.php?sorting='.$sort.'&field=email">email</a></th>
		<th scope="col">Описание</th>
		<th scope="col"><a class="link-dark text-decoration-none" href="admin.php?sorting='.$sort.'&field=state">Статус</a></th>
		<th scope="col">Категория</th>
		<th scope="col">Редактировать</th>';

	if ($total == 0) {
		echo '<tr><td colspan="7"><center>У нас нет ни одной задачи</center></td></tr>';
	} else {
	while($row = mysqli_fetch_array($result)) {
		echo'<tr><td>'.$row['id'].'</td><td>'.$row['f_name'].'</td><td>'.$row['email'].'</td><td>'.$row['f_description'].'</td><td>'.$row['state'].'</td><td>'.$row['category'].'</td><td><a href=edit.php?id=' . $row['id'] . '>Редактировать</a></td></tr>';
	}}
	echo'</table>';

	function pagination($maxpage, $page, $url, $field, $sort) {
	
		if ($sort == 'ASC') {
			$sort = 'DESC';
		} else {
			$sort = 'ASC';
		}

		echo'<ul class="pagination justify-content-center">';

		for ($i = 1; $i <= $maxpage; $i++) {
			if($i == $page) {
				echo'<li class="page-item active" aria-current="page"><span class="page-link">'.$i.'</span></li>';
			} else {
				echo'<li class="page-item"><a class="page-link" href="admin.php?p='.$i.'&sorting='.$sort.'&field='.$field.' ">'.$i.'</a></li>';
			}
		}

		echo'</ul>';

	}

	pagination($maxpage, $page, $url, $field, $sort);
?>