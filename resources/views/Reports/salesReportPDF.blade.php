<link href="{{ public_path('/others/stisla_admin_v1.0.0/dist/modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
Sales Report
<table class="detailedTable table table-striped border-primary" style="width:100%">
    <thead class="bg-primary">
        <tr class="text-center">
            <th>Date &amp; Time</th>
            <th>Consignee Name</th>
            <th>Tugboats Used</th>
            <th>Paid</th>
            <th>Unpaid</th>
            <th>Subtotal</th>
        </tr>
    </thead>  
    <tbody>
        <tr>
            <td class="text-center">05-04-2018 17:00</td>
            <td class="text-center">Akari</td>
            <td>
                <ul>
                    <li>Energy Master</li>
                    <li>Energy Sun</li>
                    <li>MT Moon</li>
                </ul>
            </td>
            <td class="text-center text-success">25000</td>
            <td class="text-center text-danger">10000</td>
            <td class="text-center">35000</td>
        </tr>
        <tr>
            <td class="text-center">05-04-2018 17:00</td>
            <td class="text-center">Bootsy</td>
            <td>
                <ul>
                    <li>Energy Moon</li>
                    <li>Energy Jupiter</li>
                    <li>MT Mars</li>
                </ul>
            </td>
            <td class="text-center text-success">25000</td>
            <td class="text-center text-danger">0</td>
            <td class="text-center ">25000</td>
        </tr>
    </tbody>
    <tfoot>
        <tr class="border-primary">
            <td><h6>Subtotal</h6></td>
            <td></td>
            <td></td>
            <td class="text-center">50000</td>
            <td class="text-center">10000</td>
            <td></td>
        </tr>
    </tfoot>
</table>
        