<?php
require_once("config.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM userinfo order by id desc";
    $query =  $connection->query($sql);
    $html = '';
    $html .= '
            <h2 align="center">Class A Database</h2>
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">ID</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">FirstName</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">LastName</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">Email</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">Gender</th>
                </tr>
                    ';
    if ($query) {
        $count = 1;
        foreach ($query as $row) {
            $html .= '
                        <tr>
                        <td style="border:1px solid #ddd; padding:8px; text-align:left;">' . $count . '</td>
                        <td style="border:1px solid #ddd; padding:8px; text-align:left;">' . $row['firstname'] . '</td>
                        <td style="border:1px solid #ddd; padding:8px; text-align:left;">' . $row['lastname'] . '</td>
                        <td style="border:1px solid #ddd; padding:8px; text-align:left;">' . $row['email'] . '</td>
                        <td style="border:1px solid #ddd; padding:8px; text-align:left;">' . $row['gender'] . '</td>
                        </tr>';
            $count++;
        }
    } else {
        $html .= '
                        <tr>
                            <td colspan="5" style="border:1px solid #ddd; padding:8px; text-align:left">No data</td>
                        </tr>';
    }
    $html .= '</table>';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();
    $dompdf->stream("data.pdf");
}
?>
