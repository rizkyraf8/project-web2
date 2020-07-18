<table>
    <thead>
        <tr>
            <td colspan="7" align="center">Report Transaction</td>
        </tr>
    </thead>
    <tbody>
        <tr></tr>
    </tbody>
</table>

<table border="1">
    <thead>
        <tr>
            <td width="30" align="center"><b>No</b></td>
            <td width="300" align="center"><b>Customer Name</b></td>
            <td width="150" align="center"><b>Target</b></td>
            <td width="150" align="center"><b>Completed</b></td>
            <td width="150" align="center"><b>Status</b></td>
            <td width="150" align="center"><b>Total Item</b></td>
            <td width="150" align="center"><b>Total Price</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $data) {
        ?>
            <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $data['customerName'] ?></td>
                <td align="center"><?= $data['transactionDateTarget'] ?></td>
                <td align="center"><?= $data['transactionDateSend'] ?></td>
                <td align="center"><?= getStatusTransaksi($data['status']) ?></td>
                <td align="right"><?= $data['totalItem'] ?></td>
                <td align="right">Rp. <?= konversi_uang($data['totalPrice']) ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>