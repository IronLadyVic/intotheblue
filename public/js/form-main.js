$(function(){

$.validator.addMethod("alphabetic",function(val, el){

	var oRegExp = new RegExp("[^a-zA-Z]");

	if(oRegExp.test(val)==false){

		return true;

	}else{

		return false;

	}
}, "not alphabetic");

$("#login-form").validate({
  rules: {
  	name:{
  		required: true,
  		alphabetic: true
		},

	email: {
    required: true,
    url: true
    },
    url: {
    required: true,
    url: true,
    minlength: 2
    }
    },
    messages:{
    	name:{
    		required: "please tell us your username"
    	}
    },
  
});
});









