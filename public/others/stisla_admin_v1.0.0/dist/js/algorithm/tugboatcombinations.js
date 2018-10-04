// Initialize Variables
// var getTugboats = [];
// var getJoborder = [];

var temporary_tugboat = [];
var joborder ;
var best_tugboat = [];
var free_tugboat = [];
var tugboatscombination = [];

// Get Tugboats and Joborder
function initialize_tugboat(initTugboat, initJoborder){
	var counter = 0;
    initTugboat.forEach(function(){
        free_tugboat[counter] = initTugboat[counter];
        console.log(free_tugboat[counter]);
        counter++;
	});
	comparison(initJoborder);
}

// Compare Joborder Weight To Total Bollard Pull of Tugboats
function comparison(joborder){
	if( free_tugboat.length != 0){
        combinations(free_tugboat);
        console.log(joborder.fltWeight);
        console.log(parseFloat(joborder.fltWeight));
        // return false;
        tugboatscombination.forEach(comb=>{
            if(parseFloat(joborder.fltWeight) < comb.total && parseFloat(joborder.fltWeight) + 20 >= comb.total ){
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
            }
        });
    }
    
}

// Calculate All Combinations
function combinations(free_tugboat) {
	var k, i, k_combs;
    combs = [];
    console.log('initialize function combination "Tugboats" ')
    console.log(free_tugboat);
    
	// Calculate all non-empty k-combinations
	for (k = 1; k <= free_tugboat.length; k++) {
		k_combs = k_combinations(free_tugboat, k);
		for (i = 0; i < k_combs.length; i++) {
			tugboatscombination.push(k_combs[i]);
		}
    }
    console.log('Before Compute');
    // return false;
    console.log('compute mo to');
    tugboatscombination.forEach(comb=>{
        comb.total = 0; //initialize total capacity
        // console.log(comb); 
        comb.forEach((adding)=>{
            console.log('BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBOLLARD PULL KINGINA',adding.strBollardPull);
            console.log('adding this:'+ parseFloat(adding.strBollardPull));
            comb.total +=  parseFloat(adding.strBollardPull); //add capacity to current total
            console.log('total of this combination', comb.total);
        });

    });
    console.log('/COMBINAAAAAAAAAAAAAATIOOOOOOOOOOOOOOOOOOOOOOOOOOON',tugboatscombination);
}

// Calculate K number of Combinations
function k_combinations(free_tugboat, k) {
	var i, j, combs, head, tailcombs;
	
	// There is no way to take e.g. sets of 5 elements
    // a set of 4.
    
    console.log('K',k);	
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
            console.log(free_tugboat);
            console.log('free tugboats n 1-sized subset: ');
            console.log(`Tugboat Capacity Bollard Pull :  ${free_tugboat[i].strName}`,parseFloat(free_tugboat[i].strBollardPull));
            combs.push([free_tugboat[i]]);
           
        }
        return combs;
	}
   
    combs = [];
    console.log('combs', combs);
    // return false;
	for (i = 0; i < free_tugboat.length - k + 1; i++) {
        // head is a list that includes only our current element.
        head = free_tugboat.slice(i, i + 1);
        console.log('//////////////HEAD///////////////////////');
        console.log('main HEAD:   ', head);
        console.log('/////////////////////////////////////////');

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

// Main Function of Algorithm
function tugboatcombinations(getTugboats,getJoborder){
    initialize_tugboat(getTugboats,getJoborder);

    console.log('Best Tugboat', best_tugboat.length);
    console.log('Tugboat Combinations', temporary_tugboat.length);
    var tugboats = [] 
    tugboats.push({
        best:best_tugboat,
        combinations:temporary_tugboat,
    });
    console.log(tugboats[0]);
    return tugboats[0];
}