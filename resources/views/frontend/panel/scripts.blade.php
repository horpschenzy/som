<script>
    // function populate(paymenttype, payment) {

    //         var pt = document.getElementById(paymenttype);
    //         var p = document.getElementById(payment);

    //              p.innerHtML = "";


    //             if ( paymenttype.value == "oneoff"){
    //                 var optionArray = ["|", "800000|NGN 8000.00"];
    //             }

    //         for( var option in optionArray) {

    //             var pair = optionArray[option].split("|");
    //             var newOption = document.createElement("option");

    //             newOption.value = pair[0];
    //             newOption.innerHTML = pair[1];
    //             p.options.add(newOption);

    //         }
    // }

    //main menu

var payments={
	Oneoff:['NGN 8000','NGN 7000'],
	Installment:['NGN 3000', 'NGN 6000'],
}


var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');


// trigger the event when paymenttype occurs

main.addEventListener('change',function(){

// getting a setected option

var selected_option = payments[this.value];

//removing the payment option using while loop


while(sub.options.length > 0){
	sub.options.remove(0);
}


});

// convert the selected object into arrary and ceeate an
//option for each array elements using constructir it will create html elements
//with given value and innerText

Array.from(selected_option).forEach(function(el){

let option = new Option(el, el);
//append the child option in th esub menu

sub.appendChild(option);

});

</script>
