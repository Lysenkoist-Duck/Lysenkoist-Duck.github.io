function makeTimer() {

	// DOB: 946688569
	var dob = 946688569;
	var epoch = Math.floor(Date.now() / 1000);
	var age = epoch - dob;

	dob = "00" + dob.toString(2);
	age = "00" + age.toString(2);

	document.getElementById("dob").innerHTML = dob.match(/.{1,4}/g).join(" ");
	document.getElementById("age").innerHTML = age.match(/.{1,4}/g).join(" ");

}

setInterval(function() { makeTimer(); }, 1000);


