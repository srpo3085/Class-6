$(document).ready(function(){
var managerScreen = managerScreen || {};
managerScreen = {
  cambiarColorFondo: function(color) {
    $("body").css('background-color',color);
  },
  saludar: function() {
    alert("hola muchachos!!!");
  },
  ocultarTodosLosElementosTag: function(tag) {
    $("div > p").toggle();
  },
  desvanecer: function(){
    $("div,p").fadeToggle(2000);
  },
  alertify : function(){
    alertify.log("Notification", "Success", 10000);
    alertify.log("Esto es un error", "Error", 7000);
    alertify.log("Notification", "Success", 8000);
    alertify.log("Notification", "Success", 5000);
    alertify.log("Esto es un error", "Error", 2000);
  }
 
};

var ms = managerScreen;

  $("#password").complexify({}, function(valid, complexity){
    alert("Password complexity: " + complexity);
  });

});
  




