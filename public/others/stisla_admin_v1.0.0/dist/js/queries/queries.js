$(document).ready(function(){
    $('#queriesTree').addClass('active');
    $('.detailedTable').DataTable({columnDefs: [
        { targets: 'noSortAction', orderable: false }
    ] ,
    language: {
        "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
        '<option hidden>1000</option>'+
        '<option value="10">10</option>'+
        '<option value="25">25</option>'+
        '<option value="50">50</option>'+
        '<option value="100">100</option>'+
        '<option value="-1">All</option>'+
        '</select> records'},
        responsive : true,
    });
    $('.selectQuery').select2({
        width: 'resolve',
        placeholder: "Select a query",
        allowClear: false
    });
    
    $('.selectQuery').change(function(){
        if(this.value == "mostUsedT"){
          $('.rowMostUsedT').show();
          $('.rowServiceJO').hide();
          $('.rowCPendingPayment').hide();
          $('.rowMostActiveCJO').hide();
          $('.rowMostActiveCContractRenew').hide();
          $('.rowMostActiveAffiliatesJO').hide();
          $('.rowMostActiveAffiliatesTeam').hide();
          $('.rowMostActiveAffiliatesTugboat').hide();
          $('.rowPaidCateredJO').hide();
          $('.rowUnpaidCateredJO').hide();
          $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "serviceJO"){
            $('.rowServiceJO').show();
            $('.rowMostUsedT').hide();
            $('.rowCPendingPayment').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "consigneePendingPayment"){
            $('.rowCPendingPayment').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "mostActiveCJO"){
            $('.rowMostActiveCJO').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowCPendingPayment').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "mostActiveCContractRenew"){
            $('.rowMostActiveCContractRenew').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowCPendingPayment').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "mostActiveAffiliatesJO"){
            $('.rowMostActiveAffiliatesJO').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowCPendingPayment').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "mostActiveAffiliatesTeam"){
            $('.rowMostActiveAffiliatesTeam').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowCPendingPayment').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "mostActiveAffiliatesTugboat"){
            $('.rowMostActiveAffiliatesTugboat').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowCPendingPayment').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "paidCateredJO"){
            $('.rowPaidCateredJO').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowCPendingPayment').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "unpaidCateredJO"){
            $('.rowUnpaidCateredJO').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowCPendingPayment').hide();
            $('.rowConsigneeExtraCredit').hide();
        }else if(this.value == "consigneeExtraCredit"){
            $('.rowConsigneeExtraCredit').show();
            $('.rowMostUsedT').hide();
            $('.rowServiceJO').hide();
            $('.rowMostActiveCJO').hide();
            $('.rowMostActiveCContractRenew').hide();
            $('.rowMostActiveAffiliatesJO').hide();
            $('.rowMostActiveAffiliatesTeam').hide();
            $('.rowMostActiveAffiliatesTugboat').hide();
            $('.rowPaidCateredJO').hide();
            $('.rowUnpaidCateredJO').hide();
            $('.rowCPendingPayment').hide();
        }
      });
});