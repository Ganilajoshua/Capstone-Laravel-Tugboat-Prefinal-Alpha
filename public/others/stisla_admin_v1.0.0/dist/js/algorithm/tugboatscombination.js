
//define objects
//CHANGES//////////////////////////////
var matrix = [
    {vgrtmax: 3000, tugnum:1, tugcap: 1000}, //For vgrtmax basis is max vessel grt
    {vgrtmax: 7000, tugnum:2, tugcap: 2000},
    {vgrtmax: 12000, tugnum:2, tugcap: 3400},
    {vgrtmax: 20000, tugnum: 2, tugcap: 4800},
    {vgrtmax: 30000, tugnum: 2, tugcap: 5400}
    ];
    
    var tugboat = [{name:'Mt. Energy Master', capacity: 2636.84}, // nakahp na to
    {name:'Mt. Energy Sun', capacity: 1521.24},
    {name:'Mt. Energy Star', capacity: 1598.33},
    {name:'Mt. Energy Sky', capacity: 2636.84},
    {name:'Mt. Energy Polaris', capacity: 3042.50},
    {name:'Mt. Energy Aquarius', capacity: 3651},
    {name:'Mt. Energy Pacific', capacity: 3245.34},
    {name:'Mt. Energy Venus', capacity: 3500}]
    //CHANGES///////////////////////////////////////
    var joborder = [{name:'JobOrder1', cweight: 3501}]
    
    var temporary_tugboat = []; 
    var best_tugboat = []; 
    var free_tugboat = [];
    var combin = [];
    var suitable_matrix = [] //CHANGES: for saving what is the most suitable matrix for the given job order// 
    var extra_tugboat = []; //CHANGES: for saving the extra combinations na more than the tug number in the matrix
    var best_extratb = []; //CHANGES: for saving the best among the extra combination of tugboats
    
    var tugboatscombination = [];
     function initialize_tugboat(initTugboat,initJoborder){
        var i=0;
        initTugboat.forEach(function(){
            free_tugboat[i] = tugboat[i];
            i++;
        });
        console.log(free_tugboat);
        comparison(initJoborder);
    }


    function comparison(joborders){
        if( free_tugboat.length != 0){
            combinations(free_tugboat);
            //CHANGES MADE://////////////////////////////////////////////////////////////////CHANGES MADE //////////////////////////
            // matrix(match for the most suitable matrix first)
            matrix.forEach(matrices =>{
                if( joborders[0].fltWeight <= matrices.vgrtmax){ // if joborder cago weight is lower than the max vessel grt
                    console.log('joborder:     ' + joborder[0].name);
                    console.log('matrix:     ' + matrices.vgrtmax);
                    if(suitable_matrix.length==0){
                        suitable_matrix = matrices; //assume 1st matrix is always the most suitable
                    }
                    else{
                        if(suitable_matrix.vgrtmax > matrices.vgrtmax){
                            suitable_matrix = matrices; //alternate if current total is less than incoming total
                        }
                    }
                }
            });

            combin.forEach(comb=>{
                    if(comb.total > suitable_matrix.tugcap && comb.length <= suitable_matrix.tugnum){ //if the suitable matrix tug capacity is less than the combination capacity total and the combination length is equal or less than the tug num required then included sya sa matches na pwede                       
                        temporary_tugboat.push(comb);
                        console.log(temporary_tugboat);
                        if(best_tugboat.length==0){
                            best_tugboat = comb; //assume 1st tugboat as best
                        }
                        else{
                            if(best_tugboat.total > comb.total){
                                best_tugboat = comb; //alternate if current total is less than incoming total
                            }
                        }
                    }else if(comb.total > suitable_matrix.tugcap && comb.length > suitable_matrix.tugnum && extra_tugboat.length != 20){ // in case there are other tugboats that could do the job order even though they are more than the number of tugboats na nasa matrix and nilimit up to 20 lang to para di masyadong marami
                        extra_tugboat.push(comb);
                        console.log(extra_tugboat);
                        console.log(extra_tugboat.length);
                            if(best_extratb.length==0){
                                best_extratb = comb; //assume 1st tugboat as best
                            }
                            else{
                                if(best_extratb.total > comb.total){
                                    best_extratb = comb; //alternate if current total is less than incoming total
                                }
                            }
                    }
            });
            // CHANGES UP TO HERE///////////////////////////////////////////////// CHANGES UP TO HERE///////////////
        }  
    }
    
    function combinations(free_tugboat) {
        var k, i, k_combs;
        combs = [];
        // Calculate all non-empty k-combinations
        for (k = 1; k <= free_tugboat.length; k++) {
            k_combs = k_combinations(free_tugboat, k);
            for (i = 0; i < k_combs.length; i++) {
                combin.push(k_combs[i]);
            }
        }
        console.log('compute mo to');
        combin.forEach(comb=>{
            comb.total = 0; //initialize total capacity
            console.log(comb); 
            comb.forEach((adding)=>{
                console.log('adding this:'+adding.capacity);
                comb.total += adding.capacity; //add capacity to current total
    
                console.log(comb.total);
            });
    
        });
        console.log(combin);
    }
    
    function k_combinations(free_tugboat, k) {
        var i, j, combs, head, tailcombs;
        
        // There is no way to take e.g. sets of 5 elements
        // a set of 4.
        if (k > free_tugboat.length || k <= 0) {
            return [];
        }
        
        // K-sized set has only one K-sized subset.
        if (k == free_tugboat.length) {
            console.log('free tugboat one set');
            console.log (free_tugboat);
            return [free_tugboat];
        }
        
        // There is N 1-sized subsets in a N-sized set.
        if (k == 1) {
            combs = [];
            for (i = 0; i < free_tugboat.length; i++) {
                console.log('free tugboats n 1-sized subset: ');
                console.log(free_tugboat[i].capacity)
                combs.push([free_tugboat[i]]);
               
            }
            return combs;
        }
       
        combs = [];
        for (i = 0; i < free_tugboat.length - k + 1; i++) {
            // head is a list that includes only our current element.
            head = free_tugboat.slice(i, i + 1);
            console.log();
            console.log('main HEAD:   ');
            console.log(head);
    
            // We take smaller combinations from the subsequent elements
            tailcombs = k_combinations(free_tugboat.slice(i + 1), k - 1);
            console.log('main TAILCOMBS:   ');  
            console.log(tailcombs);
    
            // For each (k-1)-combination we join it with the current
            // and store it to the set of k-combinations.
            for (j = 0; j < tailcombs.length; j++) {  
               console.log('HEAD:   ');
               console.log(head);
               console.log('TAILCOMBS:   ');
               console.log(tailcombs[j]);
               combs.push(head.concat(tailcombs[j]));
               console.log();
                }
            
        }
        return combs;
    }
    
    function tugboatcombinations(getTugboats,getJoborder){
        initialize_tugboat(getTugboats,getJoborder);
        console.log('FREEEEEEEEEEEEE',free_tugboat);
        return free_tugboat;
        // console.log('Best Tugboat', best_tugboat.length);
        // console.log('Tugboat Combinations', temporary_tugboat.length);
        // var tugboats = [] 
        // tugboats.push({
        //     best:best_tugboat,
        //     combinations:temporary_tugboat,
        // });
        // console.log(tugboats[0]);
        // return tugboats[0];
    }

    // function main(){
    //     initialize_tugboat();
    //     console.log();
    //     console.log('JobOrder:  ');
    //     console.log(joborder);
    //     console.log();
    //     console.log('ALL ' + free_tugboat.length + ' TUGBOATS COMBINATIONS:   ');
    //     console.log(combin);
    //     console.log();
    //     console.log();
    //     console.log(' TEMPORARY TUGBOATS COMBINATIONS QUALIFIED FOR THE JOBORDER:    ');
    //     console.log(temporary_tugboat);
    //     console.log();
    //     console.log();
    //     console.log(' EXTRA TUGBOATS COMBINATIONS QUALIFIED FOR THE JOBORDER:    ');
    //     console.log(extra_tugboat);
    //     console.log();
    //     console.log();
    //     console.log('best tugboat for the temporary tugboats: ')
    //     console.log(best_tugboat);
    //     console.log();
    //     console.log('best tugboat for the extra tugboats: ')
    //     console.log(best_extratb);
    //     console.log();
    //     console.log();
    //     console.log('ALL ' + free_tugboat.length + ' TUGBOATS COMBINATIONS COUNT:   ');
    //     console.log(combin.length);
    //     console.log();
    //     console.log('TEMPORARY TUGBOATS COMBINATIONS QUALIFIED FOR THE JOBORDER COUNT:   ');
    //     console.log(temporary_tugboat.length);
    //     console.log('EXTRA TUGBOATS COMBINATIONS QUALIFIED FOR THE JOBORDER COUNT:   ');
    //     console.log(extra_tugboat.length);
        
    
    // }
    // main();