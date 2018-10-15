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
                    <th style="width:40%;">Previous Quotations</th>
                    <th style="width:40%;">New Quotations</th>
                </tr>
            </thead>`;
            let appendBody = 
            `<tbody class="tbodyTD" style="font-size:13px;">
                <tr>
                    <td class="text-black font-weight-bold">Standard Rate (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltStandardRate}</td>
                    <td class="text-primary font-weight-bold" id="standardRate">2000</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Delay Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationTDelayFee}</td>
                    <td class="text-success font-weight-bold" id="tugboatDelayFee">2500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Violation Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationViolationFee}</td>
                    <td class="text-danger font-weight-bold" id="violationFee">3500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Late Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationConsigneeLateFee}</td>
                    <td class="text-danger font-weight-bold" id="consigneeLateFee">3500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Minimum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMinDamageFee}</td>
                    <td class="text-success font-weight-bold" id="minDamageFee">1500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMaxDamageFee}</td>
                    <td class="text-primary font-weight-bold" id="maxDamageFee">4000</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Discount (&#37;)</td>
                    <td class="text-black">${quotations[counter].intDiscount}</td>
                    <td class="text-danger font-weight-bold" id="discount">12</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Author</td>
                    <td class="text-black font-weight-bold">Hi-Energy</td>
                    <td class="text-black font-weight-bold">Tugmaster</td>
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
                    <th style="width:40%;">Previous Quotations</th>
                    <th style="width:40%;">New Quotations</th>
                </tr>
            </thead>`;
            let appendBody = 
            `<tbody class="tbodyTD" style="font-size:13px;">
                <tr>
                    <td class="text-black font-weight-bold">Standard Rate (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltStandardRate}</td>
                    <td class="text-primary font-weight-bold" id="standardRate">2000</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Delay Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationTDelayFee}</td>
                    <td class="text-success font-weight-bold" id="tugboatDelayFee">2500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Violation Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationViolationFee}</td>
                    <td class="text-danger font-weight-bold" id="violationFee">3500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Late Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltQuotationConsigneeLateFee}</td>
                    <td class="text-danger font-weight-bold" id="consigneeLateFee">3500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Minimum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMinDamageFee}</td>
                    <td class="text-success font-weight-bold" id="minDamageFee">1500</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Damage Fee (&#8369;)</td>
                    <td class="text-black">${quotations[counter].fltMaxDamageFee}</td>
                    <td class="text-primary font-weight-bold" id="maxDamageFee">4000</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Maximum Discount (&#37;)</td>
                    <td class="text-black">${quotations[counter].intDiscount}</td>
                    <td class="text-danger font-weight-bold" id="discount">12</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold">Author</td>
                    <td class="text-black font-weight-bold">Hi-Energy</td>
                    <td class="text-black font-weight-bold">Tugmaster</td>
                </tr>
            </tbody>`;
            $(appendHeader).appendTo('.tugAssistTable');
            $(appendBody).appendTo('.tugAssistTable');
        }
    }
}