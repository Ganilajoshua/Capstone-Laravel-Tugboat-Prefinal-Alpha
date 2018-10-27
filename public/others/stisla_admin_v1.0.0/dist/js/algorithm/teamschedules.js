function getAvailableTeams(jobsched,teamslist,joborder){
    console.table(jobsched);
    console.log(teamslist);
    console.log(joborder[0].datStartDate);
    var unavailableteams = [];
    var unavailable = [];
    var available = [];
    
    // for(let count =0; count < teamslist.length; count++){
    //     console.log(teamslist[count].strName);
    // }
    // return false;
    if((jobsched.length) == 0){
        console.log('Walang Jobsched');
        available = teamslist;
        unavailable = [];
        var teams = [unavailable, available];
        return teams;
    }
    else{
        console.log(teamslist);
        for(let count = 0; count < jobsched.length; count++){
            // if(joborder[0].tmStart == jobsched[count].tmStart){
            //     console.log('starting time Match');
            //     unavailableteams[count] = jobsched[count].intJSTeamID
            // }else if(joborder[0].tmStart == jobsched[count].tmEnd){
            //     console.log('end time Match');
            //     unavailableteams[count] = jobsched[count].intJSTeamID
            // }else 
            if( (joborder[0].tmStart >= jobsched[count].tmStart) && (joborder[0].tmStart <= jobsched[count].tmEnd)){
                console.log('in between time Match');
                unavailableteams[count] = jobsched[count].intJSTeamID;
            }
            else if( (joborder[0].tmStart >= jobsched[count].tmStart) && (joborder[0].tmEnd <= jobsched[count].tmEnd)){
                console.log('in between time Match 2');
                unavailableteams[count] = jobsched[count].intJSTeamID;
            }
            // }else if(joborder[0].tmStart)
        }
        console.log(unavailableteams);

        for(let counter1 = 0; counter1 < unavailableteams.length; counter1++){
            console.log(teamslist.length);
            for(let counter2 = 0; counter2 < teamslist.length; counter2++){
                if(unavailableteams[counter1] == teamslist[counter2].intTeamID){
                    unavailable.push(teamslist[counter2]);
                    teamslist.splice([counter2],1);
                }
            }
            console.table(teamslist);
            console.log(teamslist);
        }
        // for(let count = 0; count < teamslist.length; count++){
        //     for(let counter = 0; counter < unavailableteams.length; counter++){
        //         if(unavailableteams[counter] == teamslist[count].intTeamID){
        //             console.log('match');
        //             unavailable.push(teamslist[count]);
        //                teamslist.splice(teamslist[count],1);
        //         }
        //     }
        // }

        console.log('Final Scan', teamslist);
        available = teamslist;
        console.table(available);
        console.table(unavailable);
        var tugboats = [unavailable, available];
    
        return tugboats;   
    }

}