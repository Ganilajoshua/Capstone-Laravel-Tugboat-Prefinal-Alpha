function appendQuotes(quotations){
    console.log(quotations);
    for(var counter = 0; counter < quotations.length; counter++){
        if(quotations[counter].enumServiceType == 'Hauling'){
            console.log('Hauling');
            $('.haulingTable').empty();
            let appendHeader = 
            `
            <thead class="bg-primary thHeight text-white" style="font-size:15px;">
                <tr>
                    <th style="width:20%;"></th>
                    <th style="width:40%;">Quotations</th>
                </tr>
            </thead>`;
            let appendBody = 
            `<tbody class="tbodyTD" style="font-size:13px;">
                <tr>
                    <td class="text-black font-weight-bold">Standard Rate (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltStandardRate}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Delay Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationTDelayFee}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Violation Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationViolationFee}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Late Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationConsigneeLateFee}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Minimum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMinDamageFee}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMaxDamageFee}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Discount (&#37;)</td>
                    <td class="text-black">${quotations[counter].intDiscount}</td>
                </tr>
            </tbody>`;
            $(appendHeader).appendTo('.haulingTable');
            $(appendBody).appendTo('.haulingTable');
        }else if(quotations[counter].enumServiceType == 'Tug Assist'){
            console.log('Tug Assist');
            $('.tugAssistTable').empty();
            let appendHeader = 
            `
            <thead class="bg-primary thHeight text-white" style="font-size:15px;">
                <tr>
                    <th style="width:20%;"></th>
                    <th style="width:40%;">Quotations</th>
                </tr>
            </thead>`;
            let appendBody = 
            `<tbody class="tbodyTD" style="font-size:13px;">
                <tr>
                    <td class="text-black font-weight-bold">Standard Rate (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltStandardRate}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Delay Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationTDelayFee}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Violation Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationViolationFee}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Late Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationConsigneeLateFee}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Minimum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMinDamageFee}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMaxDamageFee}</td>

                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Discount (&#37;)</td>
                    <td class="text-black">${quotations[counter].intDiscount}</td>

                </tr>
            </tbody>`;
            $(appendHeader).appendTo('.tugAssistTable');
            $(appendBody).appendTo('.tugAssistTable');
        }
    }
}