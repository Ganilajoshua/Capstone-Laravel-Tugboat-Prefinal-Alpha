function getAvailableTugs(jobsched,tugboatslist,joborder){
    console.table(jobsched);
    console.table(tugboatslist);
    console.log(joborder[0].datStartDate);
    var unavailabletugs = [];
    var unavailable = [];
    var available = [];
    
    if((jobsched.length) == 0){
        console.log('Walang Jobsched');
        available = tugboatslist;

        var tugboats = [unavailable, available];
        return tugboats;
    }else{
        for(let count = 0; count < jobsched.length; count++){
            if(joborder[0].tmStart == jobsched[count].tmStart){
                console.log('starting time Match');
                unavailabletugs[count] = jobsched[count].intJSTugboatID
            }else if(joborder[0].tmStart == jobsched[count].tmEnd){
                console.log('end time Match');
                unavailabletugs[count] = jobsched[count].intJSTugboatID
            }
            // }else if(joborder[0].tmStart)
        }
    
        for(let count = 0; count < tugboatslist.length; count++){
            for(let counter = 0; counter < unavailabletugs.length; counter++){
                if(unavailabletugs[counter] == tugboatslist[count].intTugboatID){
                    console.log('match');
                    unavailable.push(tugboatslist[count]);
                    tugboatslist.splice(tugboatslist[count],1);
                }
            }
        }
        available = tugboatslist;
        console.log('Available', available);
        console.log('Unavailable', unavailable);
        var tugboats = [unavailable, available];
    
        return tugboats;   
    }

}