<?php



function getMainPostHome(){
	$db = mysqli_connect('localhost', 'root', '', 'imoh');
	$query = "SELECT * FROM accounts";
	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($result)){

		echo '  <tbody>
                                        <tr class="tr-shadow">
                                            <td>'.$row['username'].'</td>
                                            <td>
                                                <span class="block-email">'.$row['email'].'</span>
                                            </td>
                                            <td class="desc">'.$row['phone'].'</td>
                                            <td>'.$row['seminar'].'</td>
                                           
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="index.php?edit='. $row['id'] .'"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit" name ="edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>
                                                   <a href="delete.php?id='. $row['id'] .'"> <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody> ';
	}
}


?>