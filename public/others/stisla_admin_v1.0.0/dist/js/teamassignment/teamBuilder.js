$(document).ready(function(){
  $('[data-tooltip="tooltip"]').tooltip();
  // $('select').niceSelect(); 
  
  // Filter for Add
  $('#addDdAll').on('click',function() {
    document.getElementById("addDdChoices").innerHTML = "All";
    $("#addFilterName").empty();
    $("#addFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#addFilterName").addClass("text-primary");
    $("#addDdAll").addClass("active");
    $("#addDdCapt,#addDdChiefEng,#addDdCrew,#addDdOthers").removeClass("active");
    $("#addFilterName").append("All");
    $(".addTeamCaptain,.addTeamChiefEng,.addTeamCrew,.addTeamOthers").addClass('animated zoomIn faster');
    $(".addTeamCaptain,.addTeamChiefEng,.addTeamCrew,.addTeamOthers").css('display','block');
  });
  $('#addDdCapt').on('click',function() {
    document.getElementById("addDdChoices").innerHTML = "Captain";
    $("#addFilterName").empty();
    $("#addFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#addFilterName").addClass("text-success");
    $("#addDdCapt").addClass("active");
    $("#addDdAll,#addDdChiefEng,#addDdCrew,#addDdOthers").removeClass("active");
    $("#addFilterName").append("Captain");
    $(".addTeamChiefEng,.addTeamCrew,.addTeamOthers").css('display','none');
    $(".addTeamCaptain").addClass('animated zoomIn faster');
    $(".addTeamCaptain").css('display','block');
  });
  $('#addDdChiefEng').on('click',function() {
    document.getElementById("addDdChoices").innerHTML = "Chief Engineer";
    $("#addFilterName").empty();
    $("#addFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#addFilterName").addClass("text-info");
    $("#addDdChiefEng").addClass("active");
    $("#addDdAll,#addDdCapt,#addDdCrew,#addDdOthers").removeClass("active");
    $("#addFilterName").append("Chief Engineer");
    $(".addTeamCaptain,.addTeamCrew,.addTeamOthers").css('display','none');
    $(".addTeamChiefEng").addClass('animated zoomIn faster');
    $(".addTeamChiefEng").css('display','block');
  });
  $('#addDdCrew').on('click',function() {
    document.getElementById("addDdChoices").innerHTML = "Crew";
    $("#addFilterName").empty();
    $("#addFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#addFilterName").addClass("text-secondary");
    $("#addDdCrew").addClass("active");
    $("#addDdAll,#addDdCapt,#addDdChiefEng,#addDdOthers").removeClass("active");
    $("#addFilterName").append("Crew");
    $(".addTeamCaptain,.addTeamChiefEng,.addTeamOthers").css('display','none');
    $(".addTeamCrew").addClass('animated zoomIn faster');
    $(".addTeamCrew").css('display','block');
  });
  $('#addDdOthers').on('click',function() {
    document.getElementById("addDdChoices").innerHTML = "Others";
    $("#addFilterName").empty();
    $("#addFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#addFilterName").addClass("text-secondary");
    $("#addDdOthers").addClass("active");
    $("#addDdAll,#addDdCapt,#addDdChiefEng,#addDdCrew").removeClass("active");
    $("#addFilterName").append("Others");
    $(".addTeamCaptain,.addTeamChiefEng,.addTeamCrew").css('display','none');
    $(".addTeamOthers").addClass('animated zoomIn faster');
    $(".addTeamOthers").css('display','block');
  });
  //  Filter for Edit
  $('#editDdAll').on('click',function() {
    document.getElementById("editDdChoices").innerHTML = "All";
    $("#editFilterName").empty();
    $("#editFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#editFilterName").addClass("text-primary");
    $("#editFilterName").append("All");
    $("#editDdAll").addClass("active");
    $("#editDdChiefEng,#editDdCapt,#editDdCrew").removeClass("active");
    $(".editTeamCaptain,.editTeamChiefEng,.editTeamCrew").addClass('animated zoomIn faster');
    $(".editTeamCaptain,.editTeamChiefEng,.editTeamCrew").css('display','block');
  });
  $('#editDdCapt').on('click',function() {
    document.getElementById("editDdChoices").innerHTML = "Captain";
    $("#editFilterName").empty();
    $("#editFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#editFilterName").addClass("text-success");
    $("#editFilterName").append("Captain");
    $("#editDdCapt").addClass("active");
    $("#editDdAll,#editDdChiefEng,#editDdCrew").removeClass("active");
    $(".editTeamChiefEng,.editTeamCrew").css('display','none');
    $(".editTeamCaptain").addClass('animated zoomIn faster');
    $(".editTeamCaptain").css('display','block');
  });
  $('#editDdChiefEng').on('click',function() {
    document.getElementById("editDdChoices").innerHTML = "Chief Engineer";
    $("#editFilterName").empty();
    $("#editFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#editFilterName").addClass("text-info");
    $("#editFilterName").append("Chief Engineer");
    $("#editDdChiefEng").addClass("active");
    $("#editDdAll,#editDdCapt,#editDdCrew").removeClass("active");
    $(".editTeamCaptain,.editTeamCrew").css('display','none');
    $(".editTeamChiefEng").addClass('animated zoomIn faster');
    $(".editTeamChiefEng").css('display','block');
  });
  $('#editDdCrew').on('click',function() {
    document.getElementById("editDdChoices").innerHTML = "Crew";
    $("#editFilterName").empty();
    $("#editFilterName").removeClass("text-info text-success text-secondary text-primary");
    $("#editFilterName").addClass("text-secondary");
    $("#editFilterName").append("Crew");
    $("#editDdCrew").addClass("active");
    $("#editDdAll,#editDdCapt,#editDdChiefEng").removeClass("active");
    $(".editTeamCaptain,.editTeamChiefEng").css('display','none');
    $(".editTeamCrew").addClass('animated zoomIn faster');
    $(".editTeamCrew").css('display','block');
  });
  $('.modalClose').on('click',function() {
    $('#addTeam').modal('hide');
    $('#addTeamModal').modal('hide');
    $('#editTeam').modal('hide');
  });
  $('.btnAddTeam').on('click',function() {
    $('#addTeam').modal('hide');
    toastr.success('New Team has been added.', 'Add Successful!',{ closeButton: true });
  });
  $('.btnEditTeam').on('click',function() {
    $('#editTeam').modal('hide');
    toastr.success('Team has been edited.', 'Edit Successful!',{ closeButton: true });
  });
  $('.delItem').on('click',function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Team.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger waves-effect",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        swal("Deleted!", "Team has been deleted.", "success");
    });
  });
  $('#pillsJobOrder-tab').on('click',function(){
    $('.tugboatListTitle').empty();
    $('.tugboatListTitle').html('Job Order List');
    $('.tugboatListTitle').addClass('animated fadeIn');
  }); 
  $('#pillsOwnedTugboat-tab').on('click',function(){
    $('.tugboatListTitle').empty();
    $('.tugboatListTitle').html('Tugboat List');
    $('.tugboatListTitle').addClass('animated fadeIn');
  }); 
  $('#pillsReceivedTugboat-tab').on('click',function(){
    $('.tugboatListTitle').empty();
    $('.tugboatListTitle').html('Tugboat List');
    $('.tugboatListTitle').addClass('animated fadeIn');
  });
});