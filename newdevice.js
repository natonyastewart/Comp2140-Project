window.onload=function(){
    // button = document.getElementById("save");
    // customerIdField = document.getElementById("customerId").value;
    // brandField = document.getElementById("brand").value;
    // deviceTypeField = document.getElementById("deviceType").value;
    // modelNumberField = document.getElementById("modelNumber");
    // assignedPersonField = document.getElementById("assignedPerson");

    

    var myform = document.querySelector('#myform');
  
    myform.addEventListener('submit', function (element) {
      console.log('form submitted');
      var validationFailed = false;
  
      var customerId1 = document.querySelector('#customerId');
      var brand1 = document.querySelector('#brand');
      var deviceType1 = document.querySelector('#deviceType');
      var modelNumber1 = document.querySelector('#modelNumber');
      var assignedPerson1 = document.querySelector('#AssignedPerson');
  
      clearErrors();
  
      if (isEmpty(customerId1.value.trim())) {
        validationFailed = true;
        displayErrorMessage(customerId1, "You must fill in the customer id");
      }
      if (isEmpty(brand1.value.trim())) {
        validationFailed = true;
        displayErrorMessage(brand1, "You must fill in the device's brand");
      }
      if (isEmpty(deviceType1.value.trim())) {
        validationFailed = true;
        displayErrorMessage(deviceType1, "You must fill in the type of the device");
      }
      if (isEmpty(modelNumber1.value.trim())) {
        validationFailed = true;
        displayErrorMessage(modelNumber1, "You must fill in the device's model number");
      }
      if (validationFailed) {
        console.log('Please fix issues in Form submission and try again.');
        element.preventDefault();
      }

      if((customerId1.value != '') && (brand1.value != '') && (deviceType1.value != '') && (modelNumber1.value != '')){


          device = [customerId1.value, brand1.value, deviceType1.value, modelNumber1.value, assignedPerson1.value];
          httpRequest = new XMLHttpRequest();
          httpRequest.onreadystatechange = showResponse;
          data = httpRequest.open("GET", "newdevice.php?deviceInfo=" + device);
          data = JSON.stringify(data);
          httpRequest.send(data);
          console.log(device);

          function showResponse(){
              if (httpRequest.readyState === XMLHttpRequest.DONE){
                  if (httpRequest.status === 200){
                      console.log(httpRequest.responseText);
                  }
                  else{
                      alert("Invalid request.");
                  }
              }
          }
      }

    });
  };
  
  function isEmpty(elementValue) {
    if (elementValue.length == 0) {
      console.log('field is empty');
      return true;
    }
  
    return false;
  }
  function insertAfter(element, newNode) {
    element.parentNode.insertBefore(newNode, this.nextSibling);
  }
  function clearErrors() {
    var elementsWithErrors = document.querySelectorAll('.error');
    for (var x = 0; x < elementsWithErrors.length; x++) {
      elementsWithErrors[x].setAttribute('class', '');
      elementsWithErrors[x].parentNode.removeChild(elementsWithErrors[x].nextElementSibling);
    }
  
  }
  function displayErrorMessage(formField, message) {
    formField.setAttribute('class', 'error');
    var errorMessageText = document.createTextNode(message);
    var errorMessage = document.createElement('span');
    errorMessage.setAttribute('class', 'error-message');
    errorMessage.appendChild(errorMessageText);
    insertAfter(formField, errorMessage);
  }



