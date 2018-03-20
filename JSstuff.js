$(document).ready(function(){

			$(window).scroll(function(){
				if($(window).scrollTop() > 105){
					$("nav").addClass("topMenu");
				} else {
					$("nav").removeClass("topMenu");
				}
			})

			var x = Math.floor((Math.random() * 2) + 1);
			console.log(x);
			if(x ==1){
				$( "#sprite" ).animate({
					left: "100%",
				}, 2000 );
			} else{
				$( "#sprite2" ).animate({
					left: "100%",
				}, 2000 );
			}
});

var check = null;
var check2 = null;
function reg(){

	var user = $('#user').val();
	var pwd = $('#pwd').val();
	var fname = $('#fname').val();
	var lname = $('#lname').val();
	var fid = $('#fid').val();
	 

	console.log("sent");
	$.post("reg.php", {user : user, pwd : pwd, fname : fname, lname : lname, fid : fid}, function( data ) {
		check=data;
	}).done(function() {
		if (check == "fail"){
			alert("Input was not approved, please rectify");
		} else if(check == "pass"){
			window.location.href = "registered.php";
		}
	});
}

function showStuff(){
    var x = document.getElementById("nav2")
    if(x.classList.contains("hider")){
        x.classList.remove("hider");
    } else{
        x.classList.add("hider");
    }
}

function add(x){
	console.log(x.value);
	var pid = $('#pid'+ x.value).val();
	var quantity = $('#quantity'+ x.value).val();
	var price = $('#price'+ x.value).val();

	if(quantity == ''){
		alert("No Quantity inserted!");
	} else{
		$.post("add.php", {pid : pid, quantity : quantity, price : price}, function( data ) {
			console.log(data);
		});
	}
	console.log(pid + ":" + quantity + ":" + price);
}

function empCart(){
	$.get("clear.php", function( data ) {
		console.log(data);
	});
	window.location.href = "cart.php";
}

function order(){
	$.get("sendorder.php", function( data ) {
		check2 = data;
	}).done(function(){

		if(check2 == 'fail'){
			alert('Cart is Empty!')
		} else {
			window.location.href = "ordered.php";
		}
	});
}

function removeItem(x){
	console.log(x.value);
	$.post("reItem.php",{ item : x.value }, function( data ) {
		console.log(data);
	}).done(function() {
		window.location.href = "cart.php";
	});

}
