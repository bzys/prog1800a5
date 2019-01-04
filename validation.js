var allFieldsValid = false;

//this function will return true if all fields are validated, if it returns false, form will not submit
function continueOrNot(){
    return allFieldsValid;
}
//this function is called on load and focuses the customer's first name entry box
function focusThis(){
	document.getElementById("customerFirstName").focus();
}
//get rid of white spaces
function trimWhiteSpace(inputString){
    return inputString.trim();
}
//to uppercase
function allUpperCase(inputString){
    return inputString.toUpperCase();
}

function checkPart(){
    var alreadyFocused = false;
    var compoundErrorMessage = "Please fill in the mandatory fields highlighted in red.<br>";
    
    document.getElementById("vendorNo1").style.removeProperty("border");
    document.getElementById("partDesc").style.removeProperty("border");
    document.getElementById("partCost").style.removeProperty("border");
    document.getElementById("listPrice").style.removeProperty("border");

    if(document.getElementById("vendorNo1").value == ""){
        document.getElementById("vendorNo1").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Vendor Number&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("vendorNo1").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("vendorNo1").value = firstLetterUpperCase(document.getElementById("vendorNo1").value);
        allFieldsValid = true;
    }
    if(document.getElementById("partDesc").value == ""){
        document.getElementById("partDesc").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Part Description&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("partDesc").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("partDesc").value = firstLetterUpperCase(document.getElementById("partDesc").value);
        allFieldsValid = true;
    }
    if(document.getElementById("partCost").value == ""){
        document.getElementById("partCost").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Part Cost&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("partCost").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("partCost").value = firstLetterUpperCase(document.getElementById("partCost").value);
        allFieldsValid = true;
    }
    if(document.getElementById("listPrice").value == ""){
        document.getElementById("listPrice").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;List Price&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("listPrice").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("listPrice").value = firstLetterUpperCase(document.getElementById("listPrice").value);
        allFieldsValid = true;
    }
    if(compoundErrorMessage == "Please fill in the mandatory fields highlighted in red.<br>"){
        compoundErrorMessage = "<br>";
    }
    document.getElementById("partErrMsg").innerHTML = compoundErrorMessage;
}

function checkVendor(){
    var alreadyFocused = false;
    var compoundErrorMessage = "Please fill in the mandatory fields highlighted in red.<br>";

    document.getElementById("vendorNo2").style.removeProperty("border");
    document.getElementById("vendorName").style.removeProperty("border");
    document.getElementById("address1").style.removeProperty("border");
    document.getElementById("city").style.removeProperty("border");
    document.getElementById("postalCode").style.removeProperty("border");
    document.getElementById("province").style.removeProperty("border");
    document.getElementById("country").style.removeProperty("border");
    document.getElementById("phoneNum").style.removeProperty("border");
    document.getElementById("faxNum").style.removeProperty("border");

    if(document.getElementById("vendorNo2").value == ""){
        document.getElementById("vendorNo2").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Vendor Number&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("vendorNo2").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("vendorNo2").value = firstLetterUpperCase(document.getElementById("vendorNo2").value);
        allFieldsValid = true;
    }
    if(document.getElementById("vendorName").value == ""){
        document.getElementById("vendorName").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Vendor Name&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("vendorName").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("vendorName").value = firstLetterUpperCase(document.getElementById("vendorName").value);
        allFieldsValid = true;
    }
    if(document.getElementById("address1").value == ""){
        document.getElementById("address1").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Vendor Address&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("address1").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("address1").value = firstLetterUpperCase(document.getElementById("address1").value);
        allFieldsValid = true;
    }
    if(document.getElementById("city").value == ""){
        document.getElementById("city").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;City&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("city").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("city").value = firstLetterUpperCase(document.getElementById("city").value);
        allFieldsValid = true;
    }
    if(validatePostalCode(document.getElementById("postalCode").value) == false){
        document.getElementById("postalCode").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Postal Code&quot; must be in A1B2C3 or in A1B 2C3 format, or in 12345 format is it is a US postal code.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("postalCode").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("postalCode").value = allUpperCase(document.getElementById("postalCode").value.trim());
        allFieldsValid = true;
    }
    if(document.getElementById("province").value == ""){
        document.getElementById("province").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Province&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("province").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("province").value = firstLetterUpperCase(document.getElementById("province").value);
        allFieldsValid = true;
    }
    if(document.getElementById("country").value == ""){
        document.getElementById("country").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Country&quot; field cannot be blank.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("country").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("country").value = firstLetterUpperCase(document.getElementById("country").value);
        allFieldsValid = true;
    }
    if(document.getElementById("phoneNum").value == ""){
        document.getElementById("phoneNum").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Phone Number&quot; field cannot be blank. Phone number format must be xxx-xxx-xxxx or 10 numbers without the dashes.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("phoneNum").focus();
        }
        allFieldsValid = false;
    } else if(!validatePhoneNumber(document.getElementById("phoneNum").value)){
        document.getElementById("phoneNum").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Phone Number&quot; format must be xxx-xxx-xxxx or 10 numbers without the dashes.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("phoneNum").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("phoneNum").value = trimWhiteSpace(document.getElementById("phoneNum").value);
        allFieldsValid = true;
    }
    if(document.getElementById("faxNum").value != ""){
        if(!validatePhoneNumber(document.getElementById("faxNum").value)){
            document.getElementById("faxNum").style.borderColor = "red";
            compoundErrorMessage += "Error: The &quot;Fax Number&quot; format must be xxx-xxx-xxxx or 10 numbers without the dashes.<br>";
            if(alreadyFocused == false){
                alreadyFocused = true;
                document.getElementById("faxNum").focus();
            }
            allFieldsValid = false;
        } else {
            document.getElementById("faxNum").value = " ";
            allFieldsValid = true;
        }
    }

    if(compoundErrorMessage == "Please fill in the mandatory fields highlighted in red.<br>"){
        compoundErrorMessage = "<br>";
    }
    document.getElementById("vendorErrMsg").innerHTML = compoundErrorMessage;
}

function checkQuery(){
    var alreadyFocused = false;
    var compoundErrorMessage = "Please fill in the mandatory fields highlighted in red.<br>";

    document.getElementById("queryField").style.removeProperty("border");

    if(document.getElementById("queryField").value == "default"){
        document.getElementById("queryField").style.borderColor = "red";
        compoundErrorMessage += "Error: The &quot;Query Field&quot; selection cannot be the default value, please select a field.<br>";
        if(alreadyFocused == false){
            alreadyFocused = true;
            document.getElementById("queryField").focus();
        }
        allFieldsValid = false;
    } else {
        document.getElementById("queryField").value = trimWhiteSpace(document.getElementById("queryField").value);
        allFieldsValid = true;
    }

    if(compoundErrorMessage == "Please fill in the mandatory fields highlighted in red.<br>"){
        compoundErrorMessage = "<br>";
    }
    document.getElementById("queryErrMsg").innerHTML = compoundErrorMessage;
}

//this function validates the phone number using regex
function validatePhoneNumber(number){
    var pattern1 = /^\d{3}\d{3}\d{4}$/; //first pattern for matching with no dashes
    var pattern2 = /^\d{3}-{1}\d{3}-{1}\d{4}$/; //second pattern for matching with both dashes

    if(trimWhiteSpace(number).match(pattern1)){
        return true;
    } else if(trimWhiteSpace(number).match(pattern2)){
        return true;
    }
    return false;
}
function validatePostalCode(postalCode){
    //pattern for postal code
    //1 letter, 1 number, 1 letter, optional space, 1 number, 1 letter, 1 number
    var pattern1 = /^[a-z]{1}\d{1}[a-z]{1} ?\d{1}[a-z]{1}\d{1}/; 
    var pattern2 = /^\d{5}$/; //for american postal code

    //trims whitespace from postal code, send to lower, and matches to pattern
    if(trimWhiteSpace(postalCode).toLowerCase().match(pattern1)){
        return true;
    } else if(trimWhiteSpace(postalCode).match(pattern2)){
        return true;
    }
    return false;
}
function firstLetterUpperCase(inputString){
    inputString = trimWhiteSpace(inputString);

    //after trimming whitespace, letter at index 0 should be first letter to capitalize
    return inputString.charAt(0).toUpperCase() + inputString.slice(1); 
}