function getAvailableTugs(jobsched,tugboatslist,joborder){
    console.table(jobsched);
    console.log(tugboatslist);
    console.log(joborder[0].datStartDate);
    var unavailabletugs = [];
    var unavailable = [];
    var available = [];
    
    // for(let count =0; count < tugboatslist.length; count++){
    //     console.log(tugboatslist[count].strName);
    // }

    if((jobsched.length) == 0){
        console.log('Walang Jobsched');
        available = tugboatslist;
        unavailable = [];
        var tugboats = [unavailable, available];
        return tugboats;
    }else{
        console.log(tugboatslist);
        for(let count = 0; count < jobsched.length; count++){
            // if(joborder[0].tmStart == jobsched[count].tmStart){
            //     console.log('starting time Match');
            //     unavailabletugs[count] = jobsched[count].intJSTugboatID
            // }else if(joborder[0].tmStart == jobsched[count].tmEnd){
            //     console.log('end time Match');
            //     unavailabletugs[count] = jobsched[count].intJSTugboatID
            // }else 
            if( (joborder[0].tmStart >= jobsched[count].tmStart) && (joborder[0].tmStart <= jobsched[count].tmEnd)){
                console.log('in between time Match');
                unavailabletugs[count] = jobsched[count].intJSTugboatID;
            }
            else if( (joborder[0].tmStart >= jobsched[count].tmStart) && (joborder[0].tmEnd <= jobsched[count].tmEnd)){
                console.log('in between time Match 2');
                unavailabletugs[count] = jobsched[count].intJSTugboatID;
            }
            // }else if(joborder[0].tmStart)
        }
        console.log(unavailabletugs);

        for(let counter1 = 0; counter1 < unavailabletugs.length; counter1++){
            console.log(tugboatslist.length);
            for(let counter2 = 0; counter2 < tugboatslist.length; counter2++){
                if(unavailabletugs[counter1] == tugboatslist[counter2].intTugboatID){
                    unavailable.push(tugboatslist[counter2]);
                    tugboatslist.splice([counter2],1);
                }
            }
            console.table(tugboatslist);
            console.log(tugboatslist);
        }
        // for(let count = 0; count < tugboatslist.length; count++){
        //     for(let counter = 0; counter < unavailabletugs.length; counter++){
        //         if(unavailabletugs[counter] == tugboatslist[count].intTugboatID){
        //             console.log('match');
        //             unavailable.push(tugboatslist[count]);
        //                tugboatslist.splice(tugboatslist[count],1);
        //         }
        //     }
        // }

        console.log('Final Scan', tugboatslist);
        available = tugboatslist;
        console.table(available);
        console.table(unavailable);
        var tugboats = [unavailable, available];
    
        return tugboats;   
    }

}