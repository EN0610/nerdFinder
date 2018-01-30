<?php
$searchCondition = '';

if($_POST['check1'] == ){
    $searchCondition .= ' AND specialismid = 1';
}

$sql = "SELECT * 
        FROM nf_users INNER JOIN nf_userspecialisms 
        ON (nf_users.userid = nf_userspecialisms.userid)
        WHERE usertypeid = 2 AND $searchCondition";

$result = mysqli_query($sql) or die(mysqli_error());
if (mysqli_num_rows($result) == 0)
{
    echo "ERROR <br><br>";
}
else
{
    echo"<table>
    <td>portfolioimg1</td>
    <td>firstname</td>
    <td>secondname</td>
    <td>hourlyrate</td>
    </table>
   ";
    while($row = mysqli_fetch_assoc( $result ))
    {
        echo "<td>" . $row['portfolioimg1'] . " </td>";
        echo "<td>" . $row['firstname'] . " </td>";
        echo "<td>" . $row['secondname'] . " </td>";
        echo "<td>" . $row['hourlyrate'] . " </td>";
    }
    echo "</table>";
}

