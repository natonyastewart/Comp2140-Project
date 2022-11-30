//
$(function(){

    $("#login_button").click(function(){
        console.log("nice work")
    })

});


//JS Classes
class UserLogin{
    username = "";
    password = "";

    createUser(username, password){
        username = username;
        password = password;
    }

    isUser(){

    }

    validateUser(){

    }

    setPassword(){

    }

}


class Customer{
    name = "";
    phoneNumber = 0;
    emailAddress = "";
    deviceID = "";
    balance = 0;

    Customer(name, phoneNumber, emailAddress, deviceID, balance){
        name = name;
        phoneNumber = phoneNumber;
        emailAddress = emailAddress;
        deviceID = deviceID;
        balance = balance;
    }

    linkDevice(){

    }

    sendUpdates(){

    }

    addPayment(){

    }

    updateBalance(){

    }

    addCustomer(){
        
    }
}