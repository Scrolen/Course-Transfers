
window.onload = function(){
    prepareListiener();
}

function prepareListiener(){

    var refresh;

    refresh = document.getElementById("refresh")
    refresh.addEventListener(onclick, getCourses)
}

function getCourses(){
    console.log("hi");
    this.form.submit();
}
function confirmDelete(anchor){
    var conf = confirm('Are You Sure You Want To Delete This Course?');
    if(conf)
       window.location=anchor.attr("href");
}
